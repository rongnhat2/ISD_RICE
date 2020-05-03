<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Resource;

class ResourceController extends Controller
{
    private $resource;

    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }


    public function index()
    {
        $resources = DB::table('resources')->get();
        return view('admin.resource.index', compact('resources'));
    }

    public function create()
    {
        $resources = $this->resource->all();
        return view('admin.resource.add', compact('resources'));
    }

    public function store(Request $request){
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $resourceCreate = $this->resource->create([
                'resource_name' => $request->resource_name,
            ]);

            DB::commit();
            return redirect()->route('resource.index');
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
        $resource = $this->resource->findOrfail($id);
        return view('admin.resource.edit', compact('resource'));
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
            $this->resource->where('id', $id)->update([
                'resource_name' => $request->resource_name,
            ]);

            DB::commit();
            return redirect()->route('resource.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete resource
            $resource = $this->resource->find($id);
            $resource->delete($id);
            DB::commit();
            return redirect()->route('resource.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }
}
