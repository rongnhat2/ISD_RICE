<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    private $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }


    public function index()
    {
        $gallery = DB::table('gallery')->get();
        return view('admin.gallery.index', compact('gallery'));
    }

    public function create()
    {
        $gallery = $this->gallery->all();
        return view('admin.gallery.add', compact('gallery'));
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
	            DB::table('gallery')->insert([
	                'image_url'               => 'images/'.$imageitem,
	                'image_name'              =>  $value->getClientOriginalName(),
	                "created_at"        =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	                "updated_at"        => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	            ]);
	        }

            DB::commit();
            return redirect()->route('gallery.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

}
