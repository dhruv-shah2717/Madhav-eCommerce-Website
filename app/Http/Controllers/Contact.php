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

class Contact extends Controller
{
    public function contact()
    {
        $data = [
            'Information' => Contact_information::all(),
            'Map' => Contact_map::first(),
        ];
        return view('User/Contact',compact('data'));
    }

    public function contact_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'fname' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'max:200'],
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'com' => ['required'],
        ],[
            'fname.required' => 'The full name is required.',
            'fname.string' => 'The full name must be a string.',
            'fname.min' => 'The full name must be at least 2 characters long.',
            'fname.max' => 'The full name may not exceed 20 characters.',
            'fname.regex' => 'The full name must contain only letters and spaces.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email format.',
            'email.max' => 'The email address may not be greater than 200 characters.',
            'phone.required' => 'The phone number is required.',
            'phone.regex' => 'The phone number format is invalid.',
            'com.required' => 'The complaint is required.',
        ]);

        if ($validate->fails()) {
            return redirect('/contact')->withErrors($validate)->WithInput();
        }

        else {
            $com = new Contact_complain();
            $com->Complain_name = $value['fname'];
            $com->Complain_email = $value['email'];
            $com->Complain_phone = $value['phone'];
            $com->Complain_message = $value['com'];
            
            if ($com->save()) {
                session()->flash('success', 'Complaint sent successfully.');
                return redirect('/contact');
            }

            else {
                session()->flash('error', 'Complaint could not be sent. Please try again.');
                return redirect('/contact');
            }
        }
    }
}
