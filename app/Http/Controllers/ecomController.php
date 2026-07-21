<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ecomController extends Controller
{
    public function index(){

    //     $user_id=Auth::guard('web')->user()->id;
    //    return Cart::where("user_id" , $user_id)->with('product.images')->get();


        $ecomProduct= product::with('cat' , 'images')->paginate(4);
        return view('ecom.pages.index'  , compact('ecomProduct'));

    }

    public function home(){
        return view('ecom.pages.home');

    }

    public function product_details($id){
        $product= product::find($id);
        return view('ecom.pages.product_details' , compact('product'));

    }

    public function content(){
        return view('ecom.pages.content');

    }

    public function register_form(){
        return view('ecom.pages.register_form');

    }

    public function register_store(Request $request){
        return $request ;

    }

    public function login_form(){
        return view('ecom.pages.login');

    }

    public function login_check(Request $request){
        $userLogin=$request->except('_token');
        if(Auth::guard('web')->attempt($userLogin)){
            return to_route('index');
        }else{
            return to_route('user.login.form');
        }

    }

    public function logout(){
        Auth::guard('web')->logout();
        return to_route('user.login.form');

    }

    public function add_to_cart(Request $request){
        $product_id = $request->product_id ;
        $user_id = Auth::guard('web')->user()->id ;

        $cart= Cart::where("product_id" , $product_id)->where("user_id" , $user_id)->first();
        // mine (first) bring the first buying operating

        if($cart){
            $cart->increment('count');
        }else{
            Cart::create([
                "product_id"=> $product_id,
                "user_id"=> $user_id,
                "count"=> 1
            ]);
        }

    }

    public function delete_to_cart($id){
        $cartDelete=Cart::find($id);

        $cartDelete->delete();
        return to_route('index');




    }





}
