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

class Cart extends Controller
{
    public function cart()
    {
        $data = [
            'Cart' => Cart_product::where('Product_uid',"=",session('Uemail'))->get(),
        ];
        return view('User/Cart',compact('data'));
    }

    public function addcart_action($id)
    {
        $find = Product_product::where('Product_id',$id)->first();  
        $pro = new Cart_product();
        $pro->Product_pid = $id;
        $pro->Product_image = $find['Product_image1'];
        $pro->Product_name = $find['Product_name'];
        $pro->Product_price = $find['Product_price'];
        $pro->Product_uid = session('Uemail');

        if ($pro->save()) {
            session()->flash('success', 'Product added successfully.');
            return redirect('/cart');
        }

        else {
            session()->flash('error', 'Product could not be added. Please try again.');
            return redirect()->back();
        }
    }

    public function deletecart_action($id)
    {
        $result = Cart_product::where('Product_id',$id)->delete();

        if (!empty($result)) { 
            if (session()->has('coupeen')) {
                $this->refreshdis_action();
                return redirect('/cart');
            }

            else {
                return redirect('/cart');
            }
            session()->flash('success', 'Product removed successfully.');
            return redirect('/cart');
        }

        else {
            session()->flash('error', 'Product could not be removed. Please try again.');
            return redirect('/cart');
        }
    }

    public function updatecart_action($qty,$id)
    {
        $result = Cart_product::where('Product_id',$id)->update(['Product_qty' => $qty]);

        if (!empty($result)) {
            if (session()->has('coupeen')) {
                $this->refreshdis_action();
                return redirect('/cart');
            }

            else {
                return redirect('/cart');
            }    
        }

        else {
            return redirect('/cart');
        }
    }

    public function applydis_action(Request $value)
    {
        $validate = Validator::make($value->all(),[
            'discount' => ['required'],
        ],[
            'discount.required' => 'A discount coupon is required.',
        ]);

        if ($validate->fails()) {
            return redirect('/cart')->withErrors($validate)->WithInput();
        }

        else {

            if (session()->has('coupeen')) {
                session()->flash('error', 'A discount coupon is already added. Please remove the old coupon before adding a new one.');
                return redirect('/cart');
            }

            else {
                $total = 0;
                $result = Cart_discount::where('Discount_code', $value->discount)->first();
            
                if ($result) {
                    $find = Cart_product::where('Product_uid', session('Uemail'))->get();
                    
                    foreach ($find as $row) {
                        $total += $row->Product_price * $row->Product_qty;
                    }
            
                    if ($total > $result->Discount_price) {
                        session()->put('coupeen', $result->Discount_price);
                        session()->flash('success', 'Discount coupon added successfully.');
                        return redirect('/cart');
                    } 
                    
                    else {
                        session()->flash('error', 'The total price must be greater than ₹' . $result->Discount_price);
                        return redirect('/cart');
                    }
                } 
                
                else {
                    session()->flash('error', 'Discount coupon not found.');
                    return redirect('/cart');
                }
            }
            
        }
    }

    public function removedis_action() 
    {
        session()->remove('coupeen');
        session()->flash('success', 'Discount coupon removed successfully');
        return redirect('/cart');
    }

    public function refreshdis_action() 
    {
        session()->remove('coupeen');
        return redirect('/cart');
    }

    public function setsubtotal(Request $value) 
    {
        $subtotal = $value->subtotal;
        session()->put('subtotal',$subtotal);
        return redirect('/checkout');
    }
}
