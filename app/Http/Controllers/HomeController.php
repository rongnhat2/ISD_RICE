<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer_session = DB::table('users')->where('email', '=', Auth::User()->email)->first();
        $customer       =   new Customer($customer_session);
        $customer->Create($customer_session);
        $request->session()->put('customer', $customer);
        dd( Session::get('customer'));
        return redirect()->Route('item.index');
    }
}
