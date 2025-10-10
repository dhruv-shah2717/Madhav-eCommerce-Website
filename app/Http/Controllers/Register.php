<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Models\{
    Home_feature,Home_heroimage,Home_slideimage,Home_slider,
    Contact_complain,Contact_information,Contact_map,
    Cart_product,Cart_discount,Register_user,Forgotpass_token,
    Product_product,Order_order,Order_review
};

use Carbon\Carbon;
use Exception;
use Razorpay\Api\Api;

class Register extends Controller
{
    public function register()
    {
        return view('User/Register');
    }

    public function register_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'fname' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z]+$/'],
            'lname' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z]+$/'],
            'email' => ['required', 'email', 'max:200','unique:Register_users,User_email'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'password' => ['required', 'string', 'min:8'],
            'password_conf' => ['required','same:password'],
            'date' => ['required', 'date'],
            'pphoto' => ['required'],
        ],[
            'fname.required' => 'The first name is required.',
            'fname.string' => 'The first name must be a string.',
            'fname.min' => 'The first name must be at least 2 characters long.',
            'fname.max' => 'The first name may not exceed 20 characters.',
            'fname.regex' => 'The first name may only contain letters.',
            'lname.required' => 'The last name is required.',
            'lname.string' => 'The last name must be a string.',
            'lname.min' => 'The last name must be at least 2 characters long.',
            'lname.max' => 'The last name may not exceed 20 characters.',
            'lname.regex' => 'The last name may only contain letters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email address.',
            'email.max' => 'The email address may not exceed 200 characters.',
            'email.unique' => 'The email address is already registered.',
            'phone.required' => 'The phone number is required.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.regex' => 'The password is invalid.',
            'password_conf.required' => 'The confirmation password is required.',
            'password_conf.same' => 'The confirmation password does not match the original password.',
            'date.required' => 'The date is required.',
            'date.date' => 'The date must be a valid date format.',
            'pphoto.required' => 'The profile photo is required.',
        ]);

        if ($validate->fails()) {
            return redirect('/register')->withErrors($validate)->WithInput();
        }

        else {
            $use = new Register_user();
            $use->User_fname = $value['fname'];
            $use->User_lname = $value['lname'];
            $use->User_email = $value['email'];
            $use->User_phone = $value['phone'];
            $use->User_password = $value['password'];
            $use->user_date = $value['date'];
            $profile_photo = $value->pphoto->getClientOriginalName();
            $use->User_pphoto = $profile_photo;
            $token = uniqid();
            $use->User_token = $token;
            
            if ($use->save()) {
                $value->pphoto->move("Images/Profiles/", $profile_photo);
                
                $data = array('username'=>$value['fname'] ." ". $value['lname'],'email'=>$value['email'],'token'=>$token);
                Mail::Send('User/Sendlink',['data1'=>$data], function($message) use ($data) {
                    $message->to($data['email']);
                    $message->from('your_email@example.com','Dhruv Shah');
                });

                session()->flash('success', 'Registration successful. A verification link has been sent to your registered email address.');
                return redirect('/register');
            }

            else {
                session()->flash('error', 'Registration unsuccessful. Please try again.');
                return redirect('/register');
            }
        }
    }

    public function sendlink_action($email, $token)
    {    
        $result = Register_user::where('User_email', $email)->where('User_token',$token)->first();

        if (empty($result)) {
            session()->flash('error', 'Your account is not registered. Please register here.');
            return redirect('/register');
        } 
        
        else {
            if ($result->User_status == 'Active') {
                session()->flash('success', 'Your account is already activated. Please log in.');
            } 
            
            else {
                $update = Register_user::where('User_email', $email)->update(array('User_status' => 'Active'));
                if ($update) {
                    session()->flash('success', 'Your account has been activated successfully.');
                } 
                
                else {
                    session()->flash('error', 'Account activation failed. Please try again later.');
                }
            }
            return redirect('/login');
        }
    }
}
