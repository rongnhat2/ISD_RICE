<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Session;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $categories =  DB::table('categories')->get();
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        // dd($cart);
        $items =  DB::table('items')->limit(4)->get();
        // dd($items);
        // $text = 'Tất Cả Sản Phẩm';
        return view('user.index', compact('categories', 'items', 'amount_item'));
    }
    
    public function allcategory(){
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $items =  DB::table('items')->limit(4)->get();
        $categories =  DB::table('categories')->get();
        $items =  DB::table('items')->get();
        $text = 'Tất Cả Sản Phẩm';
        return view('user.allitem', compact('categories', 'items', 'text', 'amount_item'));
    }
    public function subcategory($id){
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $items =  DB::table('items')->where('category_id', '=', $id)->get();
        $text = DB::table('categories')->where('id', '=', $id)->first()->category_name;
        $categories =  DB::table('categories')->get();
        return view('user.allitem', compact('items', 'categories', 'amount_item', 'text'));
    }
    
    public function checkout(){
        $cart = Session('cart') ? Session::get('cart')->items : null;
        $item = null;
        $total_qty = 0;
        if ($cart != null) {
            foreach ($cart as $key => $value) {
                $item[$key]['data'] = DB::table('items')->where('id', '=', $value['id'])->first();
                $item[$key]['value'] = $value['qty'];
                $total_qty += $item[$key]['data']->item_prices * $item[$key]['value'];
            }
            // dd($total_qty);
        }
        
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $categories =  DB::table('categories')->get();
        return view('user.order', compact('categories', 'amount_item', 'item', 'total_qty'));
    }
    
    public function item($id){
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $categories =  DB::table('categories')->get();
        $item =  DB::table('items')->where('items.id', $id)
            ->join('resources', 'items.item_resource', '=', 'resources.id')
            ->join('trademarks', 'items.item_trademark', '=', 'trademarks.id')
            ->select('items.*', 'resources.resource_name', 'trademarks.trademark_name')
            ->first();
        // dd($item);
        return view('user.item', compact('categories', 'item', 'amount_item'));
    }
    
    public function login(){
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $categories =  DB::table('categories')->get();
        return view('user.login', compact('categories', 'amount_item'));
    }
    
    public function register(){
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;
        $categories =  DB::table('categories')->get();
        return view('user.register', compact('categories', 'amount_item'));
    }
    
}
