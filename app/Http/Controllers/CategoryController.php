<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Category;

class CategoryController extends Controller
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        $total_item = DB::raw('count(*) as total');
        $categories = DB::table('categories')
            ->join('items', 'categories.id', '=', 'items.category_id')
            ->select('categories.id', 'categories.category_name', $total_item)
            ->groupBy('categories.id', 'categories.category_name')
            ->get();
        $total = 1;
        // dd($categories);
        if (count($categories) == 0) {
            $categories = DB::table('categories')->get();
            $total = 0;
        }
        // $categories = DB::table('categories')->get();
        return view('admin.category.index', compact('categories', 'total'));
    }

    public function create()
    {
        $categories = $this->category->all();
        return view('admin.category.add', compact('categories'));
    }

    public function store(Request $request){
        // dd($request->category_name);
    	try {
            DB::beginTransaction();
            // Insert data to user table
            $categoryCreate = $this->category->create([
                'category_name' => $request->category_name,
                'category_status' => '1',
            ]);

            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }
    }

    /**
     * @param $id
     * show form edit
     */
    public function edit($id)
    {
        $category = $this->category->findOrfail($id);
        return view('admin.category.edit', compact('category'));
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
            $this->category->where('id', $id)->update([
                'category_name' => $request->category_name,
                // 'category_status' => $request->category_status
                'category_status' => $request->select_index,
            ]);

            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {

            DB::rollBack();
        }


    }


    public function delete($id)
    {
        try {
            DB::beginTransaction();
            // Delete category
            $category = $this->category->find($id);
            $category->delete($id);
            DB::commit();
            return redirect()->route('category.index');
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
