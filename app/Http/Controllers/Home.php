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

class Home extends Controller
{
    public function home()
    {
        $data = [
            'Newproduct' => Product_product::where('Product_new','Yes')->get(),
            'Treproduct' => Product_product::where('Product_trending','Yes')->get(),
            'Slider' => Home_slider::all(),
            'Heroimage' => Home_heroimage::first(),
            'Slideimage' => Home_slideimage::first(),
            'Feature' => Home_feature::all(),
        ];
        return view('User/Home',compact('data'));
    }
}
