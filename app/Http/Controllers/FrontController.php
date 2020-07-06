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
                $item[$key]['prices'] = $item[$key]['data']->item_prices - ($item[$key]['data']->item_prices * $item[$key]['data']->item_discount / 100);
                $item[$key]['value'] = $value['qty'];
                $total_qty += $item[$key]['prices'] * $item[$key]['value'];
            }
            // dd($total_qty);
        }
        // dd($cart);
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

        $user_ = Session::has('customer') ? Session::get('customer')->customer : null;
        $vote = null;
        if ($user_ != null) {
            // lấy điểm vote
            $vote =  DB::table('voting')
                ->where('voting.user_id', '=', $user_['id'])
                ->where('voting.item_id', '=', $item->id)
                ->first(); 
        }

        $calc_allvote = 0;
        // số lượng đánh giá
        $count_all_vote = DB::table('voting')
            ->where('voting.item_id', '=', $item->id)
            ->select('voting.item_id', DB::raw('Count(voting.item_id) as total'))
            ->groupBy('voting.item_id')
            ->first();
        // chất lượng đánh giá
        $sum_all_vote = DB::table('voting')
            ->where('voting.item_id', '=', $item->id)
            ->select('voting.item_id', DB::raw('Sum(voting.item_vote) as total'))
            ->groupBy('voting.item_id')
            ->first();
        // danh sách chi tiết
        $all_vote = DB::table('voting')
            ->where('voting.item_id', '=', $item->id)
            ->select('voting.item_id', 'voting.item_vote', DB::raw('Count(voting.item_vote) as total'))
            ->groupBy('voting.item_id','voting.item_vote')
            ->get();
        $detail_vote = array();
        if ($count_all_vote != null && $sum_all_vote != null) {
            // lấy trung bình sau 1 dấu phấy
            $calc_allvote = round ($sum_all_vote->total / $count_all_vote->total , 1);

            // lấy chi tiết vote
            for ($i = 1; $i <= 5; $i++) { 
                $detail_vote[$i]['total'] = 0;
                $detail_vote[$i]['calc']  = 0;
            }
            foreach ($all_vote as $value) {
                $detail_vote[$value->item_vote]['total'] = $value->total;
                $detail_vote[$value->item_vote]['calc']  = (int) ($value->total / $count_all_vote->total  * 100 );
            }
        }
        // lấy comment
        $all_comment = DB::table('comment')
            ->where('comment.item_id', '=', $item->id)
            ->join('users', 'users.id', '=', 'comment.user_id')
            ->select('comment.*', 'users.name')
            ->get();

        // lấy comment
        $sub_comment = DB::table('sub_comment')
            ->where('sub_comment.item_id', '=', $item->id)
            ->join('users', 'users.id', '=', 'sub_comment.user_id')
            ->select('sub_comment.*', 'users.name')
            ->get();

        $total_item = DB::raw('count(*) as total');
        // thống kê số lượng recomment
        $count_comment = null;
        foreach ($all_comment as $key => $value) {
            $count_comment[$value->id] = DB::table('sub_comment')
                                        ->where('sub_comment.comment_id', '=', $value->id)
                                        ->select( $total_item)
                                        ->groupBy('sub_comment.comment_id')
                                        ->first();
            if ($count_comment[$value->id] == null) {
                $count_comment[$value->id] = 0;
            }else{
                $count_comment[$value->id] = $count_comment[$value->id]->total;
            }
        }

        // dd($count_comment);
        // dd($detail_vote);
        // trả về view sản phẩm
        return view('user.item', compact('categories', 'item', 'amount_item', 'has_item', 'vote', 'calc_allvote', 'all_vote', 'detail_vote', 'all_comment', 'sub_comment', 'count_comment'));
    }
    
    public function item_finded(Request $request) {
        // dd($request);

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();

        $value = $request->item_find;
        $items = DB::table('items')->where('item_name', 'like', '%'.$value.'%')->get();
        $text  =  'Kết Quả Tìm Kiếm';
        return view('user.allitem', compact('categories', 'items', 'text', 'amount_item'));
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
    
    public function about_us(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();


        $data = DB::table('pages')->first();

        return view('user.aboutus', compact('categories', 'amount_item', 'data'));
    }
    public function contact_us(){

        // nếu đã tồn tại giỏ hàng, lấy số lượng trong giỏ hàng, hoặc trả về 0
        $amount_item = Session('cart') ? Session::get('cart')->totalQty : 0;

        // lấy giữ liệu trong category
        $categories =  DB::table('categories')->get();


        $data = DB::table('pages')->first();

        return view('user.contactus', compact('categories', 'amount_item', 'data'));
    }
}
