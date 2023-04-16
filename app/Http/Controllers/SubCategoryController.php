<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr($id)
    {
        $subCategories = SubCategory::with('translations')->where('category_id', $id)->get();
        $category = Category::find($id);
        return view('admin-Ar.sub_cat', ['subCategories' => $subCategories, 'category' => $category]);
    }

    public function indexEn($id)
    {
        $subCategories = SubCategory::with('translations')->where('category_id', $id)->get();
        $category = Category::find($id);
        return view('admin-En.sub_cat', ['subCategories' => $subCategories, 'category' => $category]);
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
    public function storeAr(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'category_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' =>'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $subCategory = new SubCategory;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/sub-categoryImage', $upload_image_name);
            $subCategory->image = 'uploads/sub-categoryImage/'.$upload_image_name;
        }
        $subCategory->category_id = $request->input('category_id');
        $subCategory->save();

        $subCategory->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $subCategory->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
        $subCategories = SubCategory::with('translations')->where('category_id', $request->input('category_id'))->get();
        $category = Category::find($request->input('category_id'));
        
        return view("admin-Ar.sections.sub-category-section")->with(['subCategories' => $subCategories, '$category' => $category]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'category_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' =>'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $subCategory = new SubCategory;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/sub-categoryImage', $upload_image_name);
            $subCategory->image = 'uploads/sub-categoryImage/'.$upload_image_name;
        }
        $subCategory->category_id = $request->input('category_id');
        $subCategory->save();

        $subCategory->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $subCategory->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
        $subCategories = SubCategory::with('translations')->where('category_id', $request->input('category_id'))->get();
        $category = Category::find($request->input('category_id'));
        
        return view("admin-En.sections.sub-category-section")->with(['subCategories' => $subCategories, '$category' => $category]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {

        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);

        $subCategory = SubCategory::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/sub-categoryImage', $upload_image_name);
            $subCategory->image = 'uploads/sub-categoryImage/'.$upload_image_name;
        }

        $subCategory->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $subCategory->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        
        $subCategory->update();
        
        $subCategories = SubCategory::with('translations')->where('category_id', $request->input('category_id'))->get();
        $category = Category::find($request->input('category_id'));
        
        return view("admin-Ar.sections.sub-category-section")->with(['subCategories' => $subCategories, '$category' => $category]);

    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);

        $subCategory = SubCategory::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/sub-categoryImage', $upload_image_name);
            $subCategory->image = 'uploads/sub-categoryImage/'.$upload_image_name;
        }

        $subCategory->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $subCategory->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        
        $subCategory->update();
        
        $subCategories = SubCategory::with('translations')->where('category_id', $request->input('category_id'))->get();
        $category = Category::find($request->input('category_id'));
        
        return view("admin-En.sections.sub-category-section")->with(['subCategories' => $subCategories, '$category' => $category]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
