<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{

    public function index()
    {
        $data = DB::table('pages')
        	->first();
        return view('admin.pages.index', compact('data'));
    }

    public function update(Request $request){
    	// dd($request);
    	try {
            DB::beginTransaction();
            // Insert data to user table
            DB::table('pages')->where('id', 1)->update([
                'contact' => $request->contact,
                'about_us' => $request->about_us,
            ]);

            DB::commit();
            return redirect()->route('pages.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }
}
