<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $categories = Category::with('translations')->get();
        return view('admin-Ar.sections.category-section', compact('categories'));

    }
    
    public function indexEn()
    {
        $categories = Category::with('translations')->get();
        return view('admin-En.sections.category-section', compact('categories'));

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
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required',
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'image.required' => 'حقل الصورة مطلوب',
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
        
        return view("admin-Ar.sections.category-section")->with(['categories' => $categories]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'image.required' => 'Image feild is required',
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
        
        return view("admin-En.sections.category-section")->with(['categories' => $categories]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {

        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
        ]);

        
        $category = Category::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/categoryImage', $upload_image_name);
            $category->image = 'uploads/categoryImage/'.$upload_image_name;
        }

        $category->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $category->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        
        $category->update();
        
        $categories = Category::with('translations')->get();
        
        return view("admin-Ar.sections.category-section")->with(['categories' => $categories]);
    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
        ]);

        $category = Category::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/categoryImage', $upload_image_name);
            $category->image = 'uploads/categoryImage/'.$upload_image_name;
        }

        $category->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $category->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        
        $category->update();
        
        $categories = Category::with('translations')->get();
        
        return view("admin-En.sections.category-section")->with(['categories' => $categories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $category = Category::find($data['id']);
        $category->translations()->delete();
        $category->delete();

        $categories = Category::with('translations')->get();
        
        return view("admin-Ar.sections.category-section")->with(['categories' => $categories]);
    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $category = Category::find($data['id']);
        $category->translations()->delete();
        $category->delete();

        $categories = Category::with('translations')->get();
        
        return view("admin-En.sections.category-section")->with(['categories' => $categories]);
    }
}
