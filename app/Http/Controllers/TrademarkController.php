<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Trademark;

class TrademarkController extends Controller
{ private $trademark;

    public function __construct(Trademark $trademark)
    {
        $this->trademark = $trademark;
    }


    public function index()
    {
        $trademarks = DB::table('trademarks')->get();
        return view('admin.trademark.index', compact('trademarks'));
    }

    public function create()
    {
        $trademarks = $this->trademark->all();
        return view('admin.trademark.add', compact('trademarks'));
    }

    public function store(Request $request){
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $trademarkCreate = $this->trademark->create([
                'trademark_name' => $request->trademark_name,
            ]);

            DB::commit();
            return redirect()->route('trademark.index');
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
        $trademark = $this->trademark->findOrfail($id);
        return view('admin.trademark.edit', compact('trademark'));
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
            $this->trademark->where('id', $id)->update([
                'trademark_name' => $request->trademark_name,
            ]);

            DB::commit();
            return redirect()->route('trademark.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete trademark
            $trademark = $this->trademark->find($id);
            $trademark->delete($id);
            DB::commit();
            return redirect()->route('trademark.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
