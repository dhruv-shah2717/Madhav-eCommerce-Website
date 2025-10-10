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

class Order extends Controller
{
    public function order()
    {
        $data = [
            'Order' => Order_order::where('Order_uid', '=', session('Uemail'))->orderBy('Order_date', 'desc')->get(),
        ];
        return view('User/Order',compact('data'));
    }

    public function addreview_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'name' => ['required', 'string', 'min:2', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'des' => ['required', 'max:500'],
            'pphoto' => ['required'],
        ],[
            'name.required' => 'The full name is required.',
            'name.string' => 'The full name must be a string.',
            'name.min' => 'The full name must be at least 2 characters long.',
            'name.max' => 'The full name may not exceed 20 characters.',
            'name.regex' => 'The full name must contain only letters and spaces.',
            'des.required' => 'The description is required.',
            'des.max' => 'The description may not exceed 200 characters.',
            'pphoto.required' => 'The photo is required.',
        ]);

        if ($validate->fails()) {
            return redirect('/order')->withErrors($validate)->WithInput();
        }

        else {
            $rev = new Order_review();
            $rev->Review_rid = $value['rid'];
            $rev->Review_name = $value['name'];
            $rev->Review_email = session('Uemail');
            $rev->Review_description = $value['des'];
            $profile_photo = $value->pphoto->getClientOriginalName();
            $rev->Review_pphoto = $profile_photo;
            
            if ($rev->save()) {
                $value->pphoto->move("Images/Reviews/", $profile_photo);
                session()->flash('success', 'Your review has been added successfully.');
                return redirect('/order');
            }

            else {
                session()->flash('error', 'Error uploading review. Please try again.');
                return redirect('/order');
            }
        }
    }
}
