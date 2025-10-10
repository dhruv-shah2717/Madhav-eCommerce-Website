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

class Admin extends Controller
{
    public function ahome()
    {
        $data = [
            'Slider' => Home_slider::all(),
            'Feature' => Home_feature::all(),
            'Slide' => Home_slideimage::all(),
            'Hero' => Home_heroimage::all(),
        ];
        return view('Admin/Ahome',compact('data'));
    }

    public function acontact()
    {
        $data = [
            'Complain' => Contact_complain::all(),
            'Information' => Contact_information::all(),
            'Map' => Contact_map::all(),
        ];
        return view('Admin/Acontact',compact('data'));
    }

    public function aproduct()
    {
        $data = [
            'Product' => Product_product::all(),
        ];
        return view('Admin/Aproduct',compact('data'));
    }

    public function aorder()
    {
        $data = [
            'Order' => Order_order::all(),
            'Review' => Order_review::all(),
        ];
        return view('Admin/Aorder',compact('data'));
    }

    public function auser()
    {
        $data = [
            'User' => Register_user::all(),
            'Discount' => Cart_Discount::all(),
        ];
        return view('Admin/Auser',compact('data'));
    }

    public function alogout_action()
    {
        session()->remove('Aemail');
        session()->flash('error', 'Logout successfully.');
        return redirect('/home');
    }

    /* Action listener */

    public function aaddslider_action(Request $value)
    {
        $slider_image = $value->slider->getClientOriginalName();
        $sli = new Home_slider();
        $sli->Slider_image = $slider_image;
        
        if ($sli->save()) {
            $value->slider->move("Images/Sliders/", $slider_image);
            session()->flash('success', 'Slider add successfully.');
            return redirect('/ahome');
        }

        else {
            session()->flash('error', 'Slider add not successfully.');
            return redirect('/ahome');
        }
    }

    public function auptslider_action(Request $value)
    {
        $id = $value['id'];
        $sli = Home_slider::find($id);
        $slider_image = $value->slider->getClientOriginalName();
        $sli->Slider_image = $slider_image;
        
        if ($sli->save()) {
            $value->slider->move("Images/Sliders/", $slider_image);
            session()->flash('success', 'Slider update successfully.');
            return redirect('/ahome');
        }

        else {
            session()->flash('error', 'Slider update not successfully.');
            return redirect('/ahome');
        }
    }

    public function adelslider_action($id)
    {
        Home_slider::find($id)->delete();
        session()->flash('success', 'Slider delete successfully.');
        return redirect('/ahome');
    }

    public function aaddfeature_action(Request $value)
    {
        $ico = $value->ico;
        $nam = $value->nam;
        $des = $value->des;
        $fea = new Home_feature();
        $fea->Feature_icon = $ico;
        $fea->Feature_name = $nam;
        $fea->Feature_description = $des;

        if ($fea->save()) {
            session()->flash('success', 'Feature add successfully.');
            return redirect('/ahome');
        }

        else {
            session()->flash('error', 'Feature add not successfully.');
            return redirect('/ahome');
        }
    }

    public function auptfeature_action(Request $value)
    {
        $id = $value['id'];
        $fea = Home_feature::find($id);
        $fea->Feature_icon = $value['ico'];
        $fea->Feature_name = $value['nam'];
        $fea->Feature_description = $value['des'];
        
        if ($fea->save()) {
            session()->flash('success', 'Feature update successfully.');
            return redirect('/ahome');
        }

        else {
            session()->flash('error', 'Feature update not successfully.');
            return redirect('/ahome');
        }
    }

    public function adelfeature_action($id)
    {
        Home_feature::find($id)->delete();
        session()->flash('success', 'Feature delete successfully.');
        return redirect('/ahome');
    }

    public function auptslide_action(Request $value)
    {
        $id = $value['id'];
        $sli = Home_slideimage::find($id);
        $sli->Slideimage_heading = $value['hea'];
        $sli->Slideimage_description = $value['des'];
        $slide_image = $value->sli->getClientOriginalName();
        $sli->Slideimage_image = $slide_image;
        
        if ($sli->save()) {
            $value->sli->move("Images/Slides/", $slide_image);
            session()->flash('success', 'Slide update successfully.');
            return redirect('/ahome');
        }

        else {
            session()->flash('error', 'Slide update not successfully.');
            return redirect('/ahome');
        }
    }

    public function aupthero_action(Request $value)
    {
        $id = $value['id'];
        $her = Home_heroimage::find($id);
        $hero_image = $value->her->getClientOriginalName();
        $her->Heroimage_image = $hero_image;
        
        if ($her->save()) {
            $value->her->move("Images/Heros/", $hero_image);
            session()->flash('success', 'Hero update successfully.');
            return redirect('/ahome');
        }

        else {
            session()->flash('error', 'Hero update not successfully.');
            return redirect('/ahome');
        }
    }

    public function aaddinformation_action(Request $value)
    {
        $ico = $value->ico;
        $hea = $value->hea;
        $des = $value->des;
        $inf = new Contact_information();
        $inf->Information_icon = $ico;
        $inf->Information_heading = $hea;
        $inf->Information_description = $des;

        if ($inf->save()) {
            session()->flash('success', 'Information add successfully.');
            return redirect('/acontact');
        }

        else {
            session()->flash('error', 'Information add not successfully.');
            return redirect('/acontact');
        }
    }

    public function auptinformation_action(Request $value)
    {
        $id = $value['id'];
        $inf = Contact_information::find($id);
        $inf->Information_icon = $value['ico'];
        $inf->Information_heading = $value['hea'];
        $inf->Information_description = $value['des'];
        
        if ($inf->save()) {
            session()->flash('success', 'Information update successfully.');
            return redirect('/acontact');
        }

        else {
            session()->flash('error', 'Information update not successfully.');
            return redirect('/acontact');
        }
    }

    public function adelinformation_action($id)
    {
        Contact_information::find($id)->delete();
        session()->flash('success', 'Information delete successfully.');
        return redirect('/acontact');
    }

    public function adelcomplain_action($id)
    {
        Contact_complain::find($id)->delete();
        session()->flash('success', 'Complain resolve successfully.');
        return redirect('/acontact');
    }

    public function auptmap_action(Request $value)
    {
        $id = $value['id'];
        $map = Contact_map::find($id);
        $map->Map_link = $value['map'];
        
        if ($map->save()) {
            session()->flash('success', 'Map update successfully.');
            return redirect('/acontact');
        }

        else {
            session()->flash('error', 'Map update not successfully.');
            return redirect('/acontact');
        }
    }

    // public function aaddproduct_action(Request $value)
    // {
    //     $pro = new Product_product();
    //     $pro->Product_brand = $value['bra'];
    //     $pro->Product_name = $value['nam'];
    //     $pro->Product_review = $value['rev'];
    //     $pro->Product_price = $value['pri'];
    //     $pro->Product_exprice = $value['exp'];
    //     $pro->Product_about = $value['abo'];
    //     $pro->Product_color = $value['col'];
    //     $pro->Product_category = $value['cat'];
    //     $pro->Product_new = $value['new'];
    //     $pro->Product_trending = $value['tre'];

    //     $image1 = $value->image1->getClientOriginalName();
    //     $image2 = $value->image2->getClientOriginalName();
    //     $image3 = $value->image3->getClientOriginalName();
    //     $image4 = $value->image4->getClientOriginalName();
    //     $pro->Product_image1 = $image1;
    //     $pro->Product_image2 = $image2;
    //     $pro->Product_image3 = $image3;
    //     $pro->Product_image4 = $image4;

    //     $value->slider->move("Images/Sliders/", $slider_image);
    //     if ($use->save()) {
    //         $value->pphoto->move("Images/Profiles/", $profile_photo);
    //         session()->flash('success', 'User add succesfully.');
    //         return redirect('/auser');
    //     }

    //     else {
    //         session()->flash('error', 'User add not succesfully.');
    //         return redirect('/auser');
    //     }
    // }

    // public function adelproduct_action($id)
    // {
    //     Product_product::find($id)->delete();
    //     session()->flash('success', 'Product delete successfully.');
    //     return redirect('/aproduct');
    // }

    public function adelorder_action($id)
    {
        Order_order::find($id)->delete();
        session()->flash('success', 'Order cancle successfully.');
        return redirect('/aorder');
    }

    public function adelreview_action($id)
    {
        Order_review::find($id)->delete();
        session()->flash('success', 'Review delete successfully.');
        return redirect('/aorder');
    }

    public function aadduser_action(Request $value)
    {
        $use = new Register_user();
        $use->User_fname = $value['fnam'];
        $use->User_lname = $value['lnam'];
        $use->User_email = $value['ema'];
        $use->User_phone = $value['pho'];
        $use->User_password = $value['pas'];
        $use->user_date = $value['dat'];
        $use->user_role = $value['rol'];
        $use->user_status = $value['sta'];
        $profile_photo = $value->pphoto->getClientOriginalName();
        $use->User_pphoto = $profile_photo;
        $token = uniqid();
        $use->User_token = $token;
        
        if ($use->save()) {
            $value->pphoto->move("Images/Profiles/", $profile_photo);
            session()->flash('success', 'User add succesfully.');
            return redirect('/auser');
        }

        else {
            session()->flash('error', 'User add not succesfully.');
            return redirect('/auser');
        }
    }

    public function auptuser_action(Request $value)
    {
        $id = $value['id'];
        $use = Register_user::find($id);
        $use->User_fname = $value['fnam'];
        $use->User_lname = $value['lnam'];
        $use->User_email = $value['ema'];
        $use->User_phone = $value['pho'];
        $use->User_password = $value['pas'];
        $use->user_date = $value['dat'];
        $use->user_role = $value['rol'];
        $use->user_status = $value['sta'];
        $profile_photo = $value->pphoto->getClientOriginalName();
        $use->User_pphoto = $profile_photo;
        $token = uniqid();
        $use->User_token = $token;
        
        if ($use->save()) {
            $value->pphoto->move("Images/Profiles/", $profile_photo);
            session()->flash('success', 'User update succesfully.');
            return redirect('/auser');
        }

        else {
            session()->flash('error', 'User update not succesfully.');
            return redirect('/auser');
        }
    }

    public function adeluser_action($id)
    {
        Register_user::find($id)->delete();
        session()->flash('success', 'User delete successfully.');
        return redirect('/auser');
    }

    public function aaddcoupeen_action(Request $value)
    {
        $cod = $value->cod;
        $pri = $value->pri;
        $cou = new Cart_discount();
        $cou->Discount_code = $cod;
        $cou->Discount_price = $pri;

        if ($cou->save()) {
            session()->flash('success', 'Coupeen add successfully.');
            return redirect('/auser');
        }

        else {
            session()->flash('error', 'Coupeen add not successfully.');
            return redirect('/auser');
        }
    }

    public function auptcoupeen_action(Request $value)
    {
        $id = $value['id'];
        $cou = Cart_discount::find($id);
        $cou->Discount_code = $value['cod'];
        $cou->Discount_price = $value['pri'];

        if ($cou->save()) {
            session()->flash('success', 'Coupeen Update successfully.');
            return redirect('/auser');
        }

        else {
            session()->flash('error', 'Coupeen update not successfully.');
            return redirect('/auser');
        }
    }

    public function adelcoupeen_action($id)
    {
        Cart_discount::find($id)->delete();
        session()->flash('success', 'Coupeen delete successfully.');
        return redirect('/auser');
    }
}
