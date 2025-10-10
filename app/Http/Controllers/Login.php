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

class Login extends Controller
{
    public function login()
    {
        return view('User/Login');
    }

    public function login_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'email' => ['required', 'email', 'max:200'],
            'password' => ['required', 'string', 'min:8'],
        ],[
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email address.',
            'email.max' => 'The email address may not exceed 200 characters.',
            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a string.',
            'password.min' => 'The password must be at least 8 characters long.',
        ]);

        if ($validate->fails()) {
            return redirect('/login')->withErrors($validate)->WithInput();
        }

        else {
            $email = $value['email'];
            $password = $value['password'];
            $result = Register_user::where('User_email', $email)->where('User_password', $password)->first();

            if (!empty($result)) {
                if ($result->User_status == 'Active') {

                    if ($result->User_role == 'User') {
                        session()->flash('success', "Login successful.");
                        session()->put('Uemail', $email);
                        return redirect('/home');
                    } 
                    
                    else {
                        session()->flash('success', "Login successful.");
                        session()->put('Aemail', $email);
                        return redirect('/ahome');
                    }
                } 
                
                else {
                    session()->flash('error', 'Your account is not activated. Please activate your account by verifying your email address using the verification link sent to your email.');
                    return redirect('/login');
                }
            } 
            
            else {
                session()->flash('error', "Incorrect email address or password. Please try again.");
                return redirect('/login');
            }
        }
    }
}
