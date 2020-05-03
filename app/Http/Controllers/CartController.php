<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart;
use Carbon\Carbon;

class CartController extends Controller
{
	public function index(){
        if(Session::has('cart')){
            $oldCart=Session::get('cart');
            $cart=new Cart($oldCart);

        	// Session::flush();
        	// dd($cart);
        	return view('cart', compact('cart'));
        }else{
        	return view('cart');
        }
    }
    public function clear(){
        Session::flush();
        return redirect()->Route('cart_index');
    }

    public function test_function_auth(){
    	
    }

    public function demo_ajax(Request $request){

            $query = $request->cart_name;
            // dd($query);
        	$oldCart    =   Session('cart') ? Session::get('cart') : null;
	        $cart       =   new Cart($oldCart);
	        $cart->add($request);
	        $request->session()->put('cart',$cart);
            // $query = $request->get('cart_name');
            // $data['cart_id'] = $request->cart_id;
            // $data['cart_name'] = $request->cart_name;
            $data_cart = Session::get('cart')->items;

            // dd($data);
           	return $data_cart;
    }

    public function getAddToCart(Request $request){
    	// dd($request);
        $oldCart    =   Session('cart') ? Session::get('cart') : null;
        $cart       =   new Cart($oldCart);
        $cart->add($request);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function orderNow(Request $req, $id){
        $product    =   DB::table('items')->find($id);
        $oldCart    =   Session('cart') ? Session::get('cart') : null;
        $cart       =   new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->Route('order');
    }

    public function getDelItemCart($id){
        $oldCart=Session('cart') ? Session::get('cart') : null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) >0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
}
