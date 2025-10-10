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

class Product extends Controller
{
    public function product($id) 
    {
        $related = Product_product::where('Product_id',$id)->first();
        $data = [
            'Product' => Product_product::where('Product_id',$id)->first(),
            'Review' => Order_review::where('Review_rid',$id)->get(),
            'Related' => Product_product::where('Product_category',$related->Product_category)->get(),
        ];
        return view('User/Product',compact('data'));
    }

    public function buynow_action()
    {
        session()->flash('success', 'Please add the product to your cart before proceeding to purchase.');
        return redirect()->back();
    }
}
