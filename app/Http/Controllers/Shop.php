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

class Shop extends Controller
{
    public function shop(Request $value)
    {
        $search = $value->search;
        if (empty($value->search)) {
            $data = [
                'Shoproduct' => Product_product::all(),
            ];
        }

        else {
            $data = [
                'Shoproduct' => Product_product::where('Product_name',"LIKE","%$value->search%")->orWhere('Product_category',"LIKE","%$value->search%")->orWhere('Product_new',"LIKE","%$value->search%")->get(),
            ];   
        }
        return view('User/Shop',compact('data','search'));        
    }
}
