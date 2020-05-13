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

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        // lấy giữ liệu trong category
        $discount_image =  DB::table('discount')->where('status', '=', '1')->first();

        // dd($cart);
        $items =  DB::table('items')->limit(4)->get();
        // dd($items);
        // $text = 'Tất Cả Sản Phẩm';
        return view('user.index', compact('categories', 'items', 'amount_item', 'discount_image'));
    }
    
    public function allcategory(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        $items =  DB::table('items')->get();
        $text = 'Tất Cả Sản Phẩm';
        return view('user.allitem', compact('categories', 'items', 'text', 'amount_item'));
    }
    public function subcategory($id){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        $items =  DB::table('items')->where('category_id', '=', $id)->get();
        $text = DB::table('categories')->where('id', '=', $id)->first()->category_name;
        return view('user.allitem', compact('items', 'categories', 'amount_item', 'text'));
    }
    
    public function checkout(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        // nếu đã tồn tại giỏ hàng, lấy sản phẩm trong giỏ hàng, hoặc trả về null
        $cart = Session('cart') ? Session::get('cart')->items : null;
        // dd($cart);
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
        return view('user.order', compact('categories', 'amount_item', 'item', 'total_qty'));
    }
    
    public function item($id){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        // biến kiếm tra đã tồn tại sản phẩm trong giỏ hàng
        $has_item = false;

        // lấy sản phẩm trong db theo id
        $item =  DB::table('items')->where('items.id', $id)
            ->join('resources', 'items.item_resource', '=', 'resources.id')
            ->join('trademarks', 'items.item_trademark', '=', 'trademarks.id')
            ->select('items.*', 'resources.resource_name', 'trademarks.trademark_name')
            ->first();

        // kiểm tra item đã tồn tại trong giỏ hàng hay chưa 
        if (Session('cart')) {
            foreach (Session::get('cart')->items as $key => $value) {
                if ($value['id'] == $item->id) {
                   $has_item = true;
                }
            }
        }

        // trả về view sản phẩm
        return view('user.item', compact('categories', 'item', 'amount_item', 'has_item'));
    }
    
    public function login(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        return view('user.login', compact('categories', 'amount_item'));
    }
    
    public function register(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        return view('user.register', compact('categories', 'amount_item'));
    }
    
}
