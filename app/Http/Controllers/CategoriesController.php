<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Categories::create([
        //     'name' => 'Fruits',           
        // ]);
        $data = Categories::orderBy('id', 'DESC')->paginate(5);
        return view('admin.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::orderBy('name', 'ASC')->select('id', 'name')->get();        
        return view('admin.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Categories $categories)
    {
        $request->validate([
            'name' => 'required|min:4|max:150|unique:categories',            
        ]);

        $data = $request->only('name');
        if($categories::create($data)){
            return redirect()->route('categories.index')->with('success', 'Create a new category successfully');
        }else{
            return redirect()->back()->with('fail', 'Fail to create a new category');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories, $id)
    {
        $category = Categories::findOrFail($id);        
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $categories, $id)
    {
        $request->validate([
            'name' => 'required|min:2|max:150|unique:categories,name'.$categories->id,            
        ]);

        $data = $request->only('name');
        if($categories::whereId($id)->update($data)){
            return redirect()->route('categories.index')->with('success', 'Update category successfully!');
        }else{
            return redirect()->back()->with('fail', 'Fail to update category!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $categories, $id)
    {
        $category = Categories::findOrFail($id);
        if($category->delete()){
            return redirect()->route('categories.index')->with('success', 'Delete category successfully!');
        }else{
            return redirect()->back()->with('fail', 'Fail to delete category');
        }
    }
}
