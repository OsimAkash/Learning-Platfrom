<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
                   if(Session::has('message')) {
                    $this->data['message'] = Session::get('message');
                }
        return view('admin.categories.categories', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
         $data = $request->all();
         Category::create($data);
         $request->session()->flash('message', 'Category added successfully');


         return redirect()->to('admin/categories');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete(); 


        Session::flash('message', 'Category deleted successfully');

         return redirect()->to('admin/categories');
    }
}
