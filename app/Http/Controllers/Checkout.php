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

class Checkout extends Controller
{
    public function checkout()
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $subtotal = session('subtotal');

        $razorpayOrder = $api->order->create([
            'receipt' => uniqid(),
            'amount' => $subtotal * 100,
            'currency' => 'INR',
        ]);

        $dorderid = $razorpayOrder->id;
        $cart = Cart_product::where('Product_uid', session('Uemail'))->get();

        foreach ($cart as $row) {
            $ord = new Order_order();
            $ord->Order_pid = $row->Product_pid;
            $ord->Order_image = $row->Product_image;
            $ord->Order_name = $row->Product_name;
            $ord->Order_price = $row->Product_price;
            $ord->Order_qty = $row->Product_qty;
            $ord->Order_date = Carbon::today();
            $ord->Order_paymentid = $dorderid;
            $ord->Order_uid = session('Uemail');
            $ord->save();
        }

        $data = [
            'Cart' => Cart_product::where('Product_uid',"=",session('Uemail'))->get(),
            'razorpayOrderId' => $razorpayOrder->id,
            'amount' => $subtotal,
            'key' => env('RAZORPAY_KEY'),
        ];

        return view('User/Checkout',compact('data'));
    }

    public function checkout_action(Request $value)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            $razorpayOrderId = $value->input('razorpay_order_id');
            $result = Order_order::where('order_paymentid', $value->input('razorpay_order_id'))->update(['Order_status' => 'Paid']);
            
            if ($result) {
                Cart_product::where('Product_uid', session('Uemail'))->delete();
                session()->remove('coupeen');
            }

            session()->flash('success', 'Order placed successfully.');
            return redirect('/order');
        } 
        
        catch (\Exception $e) {
            session()->flash('error', 'Error processing the order. Please try again.');
            return redirect('/home');
        }
    }
}
