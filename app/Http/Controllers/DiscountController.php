<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Discount;

class DiscountController extends Controller
{
	private $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }


    public function index()
    {
    	$discount = null;
        $discount = DB::table('discount')->get();
        return view('admin.discount.index', compact('discount'));
    }

    public function create()
    {
        return view('admin.discount.add');
    }

    public function store(Request $request){
    	try {
            DB::beginTransaction();

	        $image = $request->image;
        // dd($image);
	        foreach ($image as $key => $value) {
	            $imageitem = time() . $value->getClientOriginalName();
	        	// dd($imageitem);
	            $value->move(public_path('images'), $imageitem);
	            DB::table('discount')->insert([
	                'image_url'               => 'images/'.$imageitem,
	                'image_name'              =>  $value->getClientOriginalName(),
	                'status'              =>  '0',
	                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	            ]);
	        }

            DB::commit();
            return redirect()->route('discount.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function update(Request $request){

        $id_active = DB::table('discount')->where('id', '=', $request->value_id)->first()->status;
    	DB::table('discount')->update([
            'status' => '0',
        ]);
        if (!$id_active) {
        	DB::table('discount')->where('id', '=', $request->value_id)->update([
	            'status' => '1',
	        ]);
        }
    	return 'done';
    }
}
