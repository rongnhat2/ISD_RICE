<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $categories =  DB::table('categories')->get();
        
        $items =  DB::table('items')->limit(4)->get();
        // dd($items);
        // $text = 'Tất Cả Sản Phẩm';
        return view('user.index', compact('categories', 'items'));
    }
    
    public function allcategory(){
        $categories =  DB::table('categories')->get();
        $items =  DB::table('items')->get();
        $text = 'Tất Cả Sản Phẩm';
        return view('user.allitem', compact('categories', 'items', 'text'));
    }
    public function subcategory($id){
        $categories =  DB::table('categories')->get();
        return view('user.allitem', compact('categories'));
    }
    
    public function checkout(){
        $categories =  DB::table('categories')->get();
        return view('user.order', compact('categories'));
    }
    
    public function item($id){
        $categories =  DB::table('categories')->get();
        $item =  DB::table('items')->where('items.id', $id)
            ->join('resources', 'items.item_resource', '=', 'resources.id')
            ->join('trademarks', 'items.item_trademark', '=', 'trademarks.id')->first();
        return view('user.item', compact('categories', 'item'));
    }
    
    public function login(){
        $categories =  DB::table('categories')->get();
        return view('user.login', compact('categories'));
    }
    
    public function register(){
        $categories =  DB::table('categories')->get();
        return view('user.register', compact('categories'));
    }
    
}
