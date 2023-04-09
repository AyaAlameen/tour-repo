<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('translations')->get();
        // dd($categories);
        // return view("admin-Ar.sections.category-section")->with(['categories' => $categories]);
        // return view("admin-Ar.categories")->with(['categories' => $categories]);
        return view('admin-Ar.sections.category-section', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' =>'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $category = new Category;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/categoryImage', $upload_image_name);
            $category->image = 'uploads/categoryImage/'.$upload_image_name;
        }
        $category->save();

        $category->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $category->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
        $categories = Category::with('translations')->get();
        // dd($categories);
        return view("admin-Ar.sections.category-section")->with(['categories' => $categories]);
        // return response()->json(['status'=>'Success']);
        // return view('admin-Ar.categories', compact('categories'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
