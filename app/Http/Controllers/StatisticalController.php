<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Statistical;
use Carbon\Carbon;

class StatisticalController extends Controller
{
    private $statistical;

    public function __construct(Statistical $statistical)
    {
        $this->statistical = $statistical;
    }


    public function index()
    {
        // Tính tổng theo ngày
        $total_item = DB::raw('count(users_orders.updated_at) as total');

        // xử lí thời gian hiện tại
        $nowDate = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $startDate = date("Y-m-01", strtotime($nowDate));
        $endDate = date("Y-m-t", strtotime($nowDate));

        // Đơn hàng tháng này
        $count_ware = DB::table('users_orders')
                        ->where('users_orders.updated_at', '>', $startDate)
                        ->where('users_orders.updated_at', '<', $endDate)
                        ->select('users_orders.updated_at', $total_item)
                        ->groupBy('users_orders.updated_at')
                        ->get();
        // Đơn hàng tháng thành công
        $count_ware1 = DB::table('users_orders')
                        ->where('users_orders.status', '=', 1)
                        ->where('users_orders.updated_at', '>', $startDate)
                        ->where('users_orders.updated_at', '<', $endDate)
                        ->select('users_orders.updated_at', $total_item)
                        ->groupBy('users_orders.updated_at')
                        ->get();
        // Đơn hàng tháng thất bại
        $count_ware2 = DB::table('users_orders')
                        ->where('users_orders.status', '=', -1)
                        ->where('users_orders.updated_at', '>', $startDate)
                        ->where('users_orders.updated_at', '<', $endDate)
                        ->select('users_orders.updated_at', $total_item)
                        ->groupBy('users_orders.updated_at')
                        ->get();

        // tạo dữ liệu mẫu
        for ($i=0; $i < 32; $i++) { 
            $data[$i] = 0;
            $data1[$i] = 0;
            $data2[$i] = 0;
        }

        // lấy dữ liệu thật
        foreach ($count_ware as $key => $value) {
            $date = (int)substr($value->updated_at, 8, 2);
            $data[$date] = $value->total;
        }
        foreach ($count_ware1 as $key => $value) {
            $date = (int)substr($value->updated_at, 8, 2);
            $data1[$date] = $value->total;
        }
        foreach ($count_ware2 as $key => $value) {
            $date = (int)substr($value->updated_at, 8, 2);
            $data2[$date] = $value->total;
        }
        // dd($count_ware);

        // đơn hàng thành công 
        $order_success = DB::table('users_orders')
                        ->where('users_orders.status', '=', 1)
                        ->select('users_orders.status', DB::raw('count(users_orders.status) as total'))
                        ->groupBy('users_orders.status')
                        ->first();
        // đơn hàng Hủy
        $order_remove = DB::table('users_orders')
                        ->where('users_orders.status', '=', -1)
                        ->select('users_orders.status', DB::raw('count(users_orders.status) as total'))
                        ->groupBy('users_orders.status')
                        ->first();

        //  Doanh Thu
        $order_prices = DB::table('users_orders')
                        ->where('users_orders.status', '=', 1)
                        ->select('users_orders.status', DB::raw('sum(users_orders.total_price) as total'))
                        ->groupBy('users_orders.status')
                        ->first();

        //  Sản Phẩm Bán Ra
        $order_item = DB::table('users_orders')
                        ->join('sub_orders', 'sub_orders.order_id', '=', 'users_orders.id')
                        ->where('users_orders.status', '=', 1)
                        ->select('users_orders.status', DB::raw('sum(sub_orders.amounts) as total'))
                        ->groupBy('users_orders.status')
                        ->first();
        // dd($order_item);

        return view('admin.statistical.index', compact('data', 'data1', 'data2', 'count_ware', 'count_ware1', 'count_ware2', 'order_success', 'order_remove', 'order_prices', 'order_item'));
    }
}
