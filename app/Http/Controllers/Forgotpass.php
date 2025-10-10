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

class Forgotpass extends Controller
{
    public function forgotpass()
    {
        return view('User/Forgotpass');
    }

    public function delete_token()
    {
        session()->remove('error');
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        Forgotpass_token::where('Token_expiry_time', '<', $current_time)->delete();
    }

    public function check_token_expiry()
    {    
        $result = Forgotpass_token::where('Token_email', session()->get('forgot_em'))->first();   
        if (empty($result)) {
            session()->flash('error', 'OTP has expired. Please request a new one.');
            return redirect('/forgotpass');
        }
    }

    public function forgotpass_action(Request $value)
    {    
        $validate = Validator::make($value->all(),[
            'email' => ['required', 'email', 'max:200'],
        ],[
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email address.',
            'email.max' => 'The email address may not exceed 200 characters.',
        ]);

        if ($validate->fails()) {
            return redirect('/forgotpass')->withErrors($validate)->WithInput();
        }

        else {
            $this->delete_token();
            $email = $value->email;
            $result = Register_user::where('User_email', $email)->first();

            if (empty($result)) {
                session()->flash('error', 'Email address is not registered. Please enter a registered email address.');
                return redirect('/forgotpass');
            } 
            
            else {
                $result = Forgotpass_token::where('Token_email', $value->email)->first();
                if ($result) {
                    session()->flash('error', 'A password reset link has already been sent to your email. Please check your inbox. A new link will be generated after the current link expires.');
                    return redirect('/verifyotp');
                } 
                
                else {
                    date_default_timezone_set("Asia/Kolkata");
                    $data = Register_user::where('User_email', $email)->first();
                    $otp = mt_rand(100000, 999999);
                    $data1 = array('name' => $data->User_fname." ".$data->User_lname, 'email' => $email, 'otp' => $otp);

                    try {
                        Mail::Send('User/Sendotp', ["data2" => $data1], function ($message) use ($data1) {
                            $message->to($data1['email'], $data1['name'])->subject('Password Reset');
                            $message->from('your_email@example.com','Dhruv Shah');
                        });
                    } 
                    
                    catch (Exception $ex) {
                        session()->flash('error', 'We encountered an error while sending the password reset token. Please try again later.');
                        return redirect('/forgotpass');
                    }

                    $expiry_time = Carbon::now()->addMinutes(2);
                    $tok = new Forgotpass_token();
                    $tok->Token_email = $email;
                    $tok->Token_otp = $otp;
                    session()->put('forgot_em', $email);
                    $tok->Token_expiry_time = $expiry_time;

                    if ($tok->save()) {
                        session()->flash('success', 'Password reset token has been sent to your registered email address.');
                        return redirect('/verifyotp');
                    } 
                    
                    else {
                        session()->flash('error', 'Sorry, the email address you entered is not registered.');
                        return redirect('/forgotpass');
                    }
                }
            }
        }   
    }

    public function verifyotp()
    {
        $this->delete_token();
        $this->check_token_expiry();
        return view('User/Verifyotp');
    }

    public function verifyotp_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'otp' => ['required','min:6','numeric'],
        ],[
            'otp.required' => 'The OTP is required.',
            'otp.min' => 'The OTP must be at least 6 characters long.',
            'otp.numeric' => 'The OTP must contain only numbers.',
        ]);

        if ($validate->fails()) {
            return redirect('/verifyotp')->withErrors($validate)->WithInput();
        }

        else {
            $this->delete_token();
            $this->check_token_expiry();
            $otp = $value->otp;
            $result = Forgotpass_token::where('Token_email', session()->get('forgot_em'))->first();
            
            if ($result->Token_otp == $otp) {
                return redirect('/newpass');
            } 
            
            else {
                session()->flash('error', 'Incorrect OTP. Please try again.');
                return view('User/Verifyotp');
            }
        }
    }

    public function newpass()
    {
        $this->delete_token();
        $this->check_token_expiry();
        return view('User/Newpass');
    }

    public function newpass_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'newpass' => ['required', 'string', 'min:8'],
            'password_conf' => ['required','same:newpass'],
        ],[
            'newpass.required' => 'The password is required.',
            'newpass.string' => 'The password must be a string.',
            'newpass.min' => 'The password must be at least 8 characters long.',
            'password_conf.required' => 'The confirmation password is required.',
            'password_conf.same' => 'The confirmation password does not match the original password.',
        ]);

        if ($validate->fails()) {
            return redirect('/newpass')->withErrors($validate)->WithInput();
        }

        else  {
            $updt = Register_user::where('User_email', session()->get('forgot_em'))->update(array('User_password' => $value->newpass));
            if ($updt) {
                Forgotpass_token::where('Token_email', session()->get('forgot_em'))->delete();
                session()->remove('forgot_em');
                session()->flash('success', 'Password updated successfully.');
                return redirect('/login');
            } 
            
            else {
                session()->flash('error', 'Error resetting password. Please try again.');
                return redirect('/forgotpass');
            }
        }    
    }
}
