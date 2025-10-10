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

class Profile extends Controller
{
    public function profile()
    {
        $data = [
            'User' => Register_user::where('User_email',session('Uemail'))->first(),
        ];     
        return view('User/Profile',compact('data'));
    }

    public function cpass_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'opassword' => ['required', 'string', 'min:8'],
            'npassword' => ['required', 'string', 'min:8']
        ],[
            'opassword.required' => 'The Password is required.',
            'opassword.string' => 'The Password must be a string.',
            'opassword.min' => 'The Password must be at least 8 characters.',
            'npassword.required' => 'The Password is required.',
            'npassword.string' => 'The Password must be a string.',
            'npassword.min' => 'The Password must be at least 8 characters.',
        ]);

        if ($validate->fails()) {
            return redirect('/profile')->withErrors($validate)->WithInput();
        }

        else {
            $opassword = $value['opassword'];
            $npassword = $value['npassword'];
            $result = Register_user::where('User_email',session('Uemail'))->first();

            if ($result['User_password'] == $opassword) {
                $result = Register_user::where('User_email', session('Uemail'))->update(['User_password' => $npassword]);
                session()->flash('success', "Password changed successfully.");
                return redirect('/profile');
            }

            else {
                session()->flash('error', "Old password does not match.");
                return redirect('/profile');
            }
        }
    }

    public function eprofile_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'fname' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z]+$/'],
            'lname' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z]+$/'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'date' => ['required', 'date'],
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
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone number format is invalid.',
            'date.required' => 'The date is required.',
            'date.date' => 'The date must be a valid date format.',
        ]);

        if ($validate->fails()) {
            return redirect('/profile')->withErrors($validate)->WithInput();
        }

        else {
            $fname = $value['fname'];
            $lname = $value['lname'];
            $phone = $value['phone'];
            $date = $value['date'];

            if (empty($value['pphoto'])) {
                $result = Register_user::where('User_email', session('Uemail'))->update(['User_fname' => $fname, 'User_lname' => $lname, 'User_phone' => $phone, 'User_date' => $date]);

                if (empty($result)) {
                    session()->flash('error', "Details update unsuccessful. Please try again.");
                    return redirect('/profile');
                }

                else {
                    session()->flash('success', "Details updated successfully.");
                    return redirect('/profile');
                }
            }

            else {
                $profile_photo = $value->pphoto->getClientOriginalName();
                $pphoto = $profile_photo;
                $result = Register_user::where('User_email', session('Uemail'))->update(['User_fname' => $fname, 'User_lname' => $lname, 'User_phone' => $phone, 'User_date' => $date, 'User_pphoto' => $pphoto]);

                if (empty($result)) {
                    session()->flash('error', "Details update unsuccessful. Please try again.");
                    return redirect('/profile');
                }

                else {
                    $value->pphoto->move("Images/Profiles/", $profile_photo);
                    session()->flash('success', "Details updated successfully.");
                    return redirect('/profile');
                }

            }
        }
    }

    public function logout_action()
    {
        session()->remove('Uemail');
        session()->remove('forgot_em');
        session()->remove('coupeen');
        session()->flash('error', 'Logout successfully.');
        return redirect('/home');
    }
}
