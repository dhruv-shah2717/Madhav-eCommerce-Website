<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Home;
use App\Http\Controllers\Shop;
use App\Http\Controllers\Contact;
use App\Http\Controllers\Cart;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Order;
use App\Http\Controllers\Product;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\Forgotpass;
use App\Http\Middleware\UserAuthentication;
use App\Http\Middleware\AdminAuthentication;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Default */

Route::get('/', function () {
    return redirect('/home');
});

/* Home */

Route::get('/home', [Home::class, 'home']);

/* Shop */

Route::get('/shop', [Shop::class, 'shop']);

/* Product */

Route::get('/product/{id}', [Product::class, 'product']);

/* Contact */

Route::get('/contact', [Contact::class, 'contact']);
Route::post('/contact_action', [Contact::class, 'contact_action']);

/* Login */

Route::get('/login', [Login::class, 'login']);
Route::post('/login_action', [Login::class, 'login_action']);

/* Register */

Route::get('/register', [Register::class, 'register']);
Route::post('/register_action', [Register::class, 'register_action']);
Route::get('/sendlink_action/{email}/{token}', [Register::class, 'sendlink_action']);

/* Forgot Password */

Route::get('/forgotpass', [Forgotpass::class, 'forgotpass']);
Route::post('/forgotpass_action', [Forgotpass::class, 'forgotpass_action']);
Route::get('/verifyotp', [Forgotpass::class, 'verifyotp']);
Route::post('/verifyotp_action', [Forgotpass::class, 'verifyotp_action']);
Route::get('/newpass', [Forgotpass::class, 'newpass']);
Route::post('/newpass_action', [Forgotpass::class, 'newpass_action']);

/* User Authentication */

Route::middleware([UserAuthentication::class])->group(function () {

    /* Profile */

    Route::get('/profile', [Profile::class, 'profile']);
    Route::post('/cpass_action', [Profile::class, 'cpass_action']);
    Route::post('/eprofile_action', [Profile::class, 'eprofile_action']);

    /* Logout */

    Route::get('/logout_action', [Profile::class, 'logout_action']);

    /* Product */

    Route::get('/buynow_action', [Product::class, 'buynow_action']);

    /* Cart */

    Route::get('/cart', [Cart::class, 'cart']);
    Route::get('/addcart_action/{id}', [Cart::class, 'addcart_action']);
    Route::get('/deletecart_action/{id}', [Cart::class, 'deletecart_action']);
    Route::get('/updatecart_action/{id},{qty}', [Cart::class, 'updatecart_action']);
    Route::post('/applydis_action', [Cart::class, 'applydis_action']);
    Route::get('/removedis_action', [Cart::class, 'removedis_action']);
    Route::post('/setsubtotal', [Cart::class, 'setsubtotal']);

    /* Checkout */

    Route::get('/checkout', [Checkout::class, 'checkout']);
    Route::post('/checkout_action', [Checkout::class, 'checkout_action']);

    /* Order */

    Route::get('/order', [Order::class, 'order']);
    Route::post('/addreview_action', [Order::class, 'addreview_action']);
});

/* Admin Authentication */

Route::middleware([AdminAuthentication::class])->group(function () {

    /* Ahome */

    Route::get('/ahome', [Admin::class, 'ahome']);
    Route::post('/aaddslider_action', [Admin::class, 'aaddslider_action']);
    Route::post('/auptslider_action', [Admin::class, 'auptslider_action']);
    Route::get('/adelslider_action/{id}', [Admin::class, 'adelslider_action']);
    Route::post('/aaddfeature_action', [Admin::class, 'aaddfeature_action']);
    Route::post('/auptfeature_action', [Admin::class, 'auptfeature_action']);
    Route::get('/adelfeature_action/{id}', [Admin::class, 'adelfeature_action']);
    Route::post('/auptslide_action', [Admin::class, 'auptslide_action']);
    Route::post('/aupthero_action', [Admin::class, 'aupthero_action']);

    /* Acontact */

    Route::get('/acontact', [Admin::class, 'acontact']);
    Route::post('/aaddinformation_action', [Admin::class, 'aaddinformation_action']);
    Route::post('/auptinformation_action', [Admin::class, 'auptinformation_action']);
    Route::get('/adelinformation_action/{id}', [Admin::class, 'adelinformation_action']);
    Route::get('/adelcomplain_action/{id}', [Admin::class, 'adelcomplain_action']);
    Route::post('/auptmap_action', [Admin::class, 'auptmap_action']);

    /* Aproduct */

    Route::get('/aproduct', [Admin::class, 'aproduct']);
    Route::post('/aaddproduct_action', [Admin::class, 'aaddproduct_action']);
    //Route::post('/auptproduct_action', [Admin::class, 'auptproduct_action']);
    Route::get('/adelproduct_action/{id}', [Admin::class, 'adelproduct_action']);

    /* Aorder */

    Route::get('/aorder', [Admin::class, 'aorder']);
    Route::get('/adelorder_action/{id}', [Admin::class, 'adelorder_action']);
    Route::get('/adelreview_action/{id}', [Admin::class, 'adelreview_action']);

    /* Auser */
    
    Route::get('/auser', [Admin::class, 'auser']);
    Route::post('/aadduser_action', [Admin::class, 'aadduser_action']);
    Route::post('/auptuser_action', [Admin::class, 'auptuser_action']);
    Route::get('/adeluser_action/{id}', [Admin::class, 'adeluser_action']);
    Route::post('/aaddcoupeen_action', [Admin::class, 'aaddcoupeen_action']);
    Route::post('/auptcoupeen_action', [Admin::class, 'auptcoupeen_action']);
    Route::get('/adelcoupeen_action/{id}', [Admin::class, 'adelcoupeen_action']);
    
    /* Logout */

    Route::get('/alogout_action', [Admin::class, 'alogout_action']);
});
