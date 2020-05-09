<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Statistical;

class StatisticalController extends Controller
{
    private $statistical;

    public function __construct(Statistical $statistical)
    {
        $this->statistical = $statistical;
    }


    public function index()
    {
        $items = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->join('resources', 'items.item_resource', '=', 'resources.id')
            ->join('trademarks', 'items.item_trademark', '=', 'trademarks.id')
            ->select('items.*', 'resources.resource_name', 'trademarks.trademark_name', 'categories.category_name')
        	->get();
        return view('admin.statistical.index', compact('items'));
    }

    public function create()
    {
        $items = $this->item->all();
        $categories = DB::table('categories')->get();
        $resources = DB::table('resources')->get();
        $trademarks = DB::table('trademarks')->get();
        $gallery = $this->gallery->all();
        return view('admin.item.add', compact('items', 'categories', 'resources', 'trademarks', 'gallery'));
    }

    public function store(Request $request){
    	// dd($request);
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $itemCreate = $this->item->create([
                'category_id' => $request->category_index,
                'item_name' => $request->item_name,
                'item_size' => $request->item_size,
                'item_discount' => $request->item_discount,
                'item_resource' => $request->resource_index,
                'item_trademark' => $request->trademark_index,
                'item_prices' => $request->item_prices,
                'item_image' => $request->item_image,
                'item_amounts' => '1',
                'item_detail' => $request->item_detail,
            ]);

            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        // $items = $this->item->first();
        // dd($items);
        $items = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.id')
            ->join('resources', 'items.item_resource', '=', 'resources.id')
            ->join('trademarks', 'items.item_trademark', '=', 'trademarks.id')
            ->where('items.id', $id)
            ->select('items.*', 'resources.resource_name', 'trademarks.trademark_name', 'categories.category_name')
            ->first();
        $categories = DB::table('categories')->get();
        $resources = DB::table('resources')->get();
        $trademarks = DB::table('trademarks')->get();
        $gallery = $this->gallery->all();
        return view('admin.item.edit', compact('items', 'categories', 'resources', 'trademarks', 'gallery'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // update user tabale
            $this->item->where('id', $id)->update([
                'category_id' => $request->category_index,
                'item_name' => $request->item_name,
                'item_size' => $request->item_size,
                'item_discount' => $request->item_discount,
                'item_resource' => $request->resource_index,
                'item_trademark' => $request->trademark_index,
                'item_prices' => $request->item_prices,
                'item_image' => $request->item_image,
                'item_detail' => $request->item_detail,
            ]);

            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $item = $this->item->find($id);
            $item->delete($id);
            DB::commit();
            return redirect()->route('item.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
