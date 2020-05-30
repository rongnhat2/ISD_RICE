<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ShipController extends Controller
{
    public function index()
    {
        $order = DB::table('users_orders')
            ->join('users', 'users_orders.user_id', '=', 'users.id')
            ->join('user_detail', 'user_detail.user_id', '=', 'users.id')
            ->where('users_orders.status', '=', 0)
            ->select('users_orders.*', 'users.name', 'user_detail.phone', 'user_detail.address')
            ->get();
        // dd($order);
        return view('admin.ship.index', compact('order'));
    }
    public function allshipindex()
    {
        $order = DB::table('users_orders')
            ->join('users', 'users_orders.user_id', '=', 'users.id')
            ->join('user_detail', 'user_detail.user_id', '=', 'users.id')
            ->select('users_orders.*', 'users.name', 'user_detail.phone', 'user_detail.address')
            ->get();
        // dd($order);
        return view('admin.allship.index', compact('order'));
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        // $items = $this->item->first();
        // dd($items);
        $items = DB::table('sub_orders')
            ->join('items', 'sub_orders.item_id', '=', 'items.id')
            ->where('sub_orders.order_id', $id)
            ->select('sub_orders.*', 'items.item_name', 'items.item_amounts')
            ->get();
        $check_item = true;
        $total = 0;
        foreach ($items as $key => $value) {
            if ($value->amounts > $value->item_amounts) {
                $check_item = false;
            }
            $total += $value->total_price;
        }
        return view('admin.ship.edit', compact('items', 'id', 'check_item', 'total'));
    }
    /**
     * @param $id
     * show form edit
     */
    public function allshipedit($id)
    {
        // $items = $this->item->first();
        // dd($items);
        $items = DB::table('sub_orders')
            ->join('items', 'sub_orders.item_id', '=', 'items.id')
            ->where('sub_orders.order_id', $id)
            ->select('sub_orders.*', 'items.item_name', 'items.item_amounts')
            ->get();
        $total = 0;
        foreach ($items as $key => $value) {
            $total += $value->total_price;
        }
        return view('admin.allship.edit', compact('items', 'id', 'total'));
    }

    public function success($id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            $items = DB::table('sub_orders')
                ->join('items', 'sub_orders.item_id', '=', 'items.id')
                ->where('sub_orders.order_id', $id)
                ->select('sub_orders.*', 'items.item_name')
                ->get();
            // dd($items[0]);
            DB::table('users_orders')->where('id', $id)->update([
                'status' => '1',
            ]);
            for ($i=0; $i < count($items); $i++) { 
                $sellHistory =  DB::table('items')->where('id', $items[0]->item_id)->first()->item_sell;
                $totalHistory =  DB::table('items')->where('id', $items[0]->item_id)->first()->item_amounts;
                DB::table('items')->where('id', $items[0]->item_id)->update([
                    'item_sell' => $sellHistory - -$items[0]->amounts,
                    'item_amounts' => $totalHistory - $items[0]->amounts,
                ]);
            }
            DB::commit();
            return redirect()->route('ship.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }
    public function remove($id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            DB::table('users_orders')->where('id', $id)->update([
                'status' => '-1',
            ]);

            DB::commit();
            return redirect()->route('ship.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    public function getShip(Request $request)
    {	
    	// dd($request);
        $borrow = DB::table('users_orders')
            ->join('users', 'users_orders.user_id', '=', 'users.id')
            ->join('user_detail', 'user_detail.user_id', '=', 'users.id')
            ->where('users_orders.status', '=', 0)
            ->select('users_orders.*', 'users.name', 'user_detail.phone', 'user_detail.address')
        	->when(!empty($request->value[0]), function ($query) use ($request) {
                return $query->where('users.name', 'like', '%'.$request->value[0].'%');
            })
            ->when(!empty($request->value[1]), function ($query) use ($request) {
                return $query->where('users.phone', 'like', '%'.$request->value[1].'%');
            })
            ->when(!empty($request->value[2]), function ($query) use ($request) {
                return $query->where('users.address', 'like', '%'.$request->value[2].'%');
            })
            ->when(!empty($request->value[3]), function ($query) use ($request) {
                return $query->where('users_orders.created_at', 'like', '%'.$request->value[3].'%');
            })
            ->get();
        return $borrow;
    }
}
