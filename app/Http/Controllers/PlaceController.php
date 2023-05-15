<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\City;
use App\Models\District;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();

        return view('admin-Ar.places', ['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);


    }
    
    public function indexEn()
    {
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();

        return view('admin-Er.places', ['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);


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
        // dd($request);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'sub_category_id' => 'required',
            'email' => ['required', 'email', 'unique:places'],
            'profit_ratio_1' => 'required|numeric|min:1',
            'profit_ratio_2' => 'required|numeric|min:1',
            'geolocation' => 'required',

        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'image.required' => 'حقل الصورة مطلوب',
            'city_id.required' => 'حقل المدينة مطلوب',
            'district_id.required' => 'حقل الناحية مطلوب',
            'sub_category_id.required' => 'حقل الصنف الفرعي مطلوب',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            'profit_ratio_1.required' => 'حقل نسبة الأرباح الخارجية مطلوب',
            'profit_ratio_1.numeric' => 'حقل نسبة الأرباح الخارجية يجب أن يكون رقم',
            'profit_ratio_1.min' => 'حقل نسبة الأرباح الخارجية يجب أن يكون أكبر من الصفر',
            'profit_ratio_2.required' => 'حقل نسبة الأرباح الداخلية مطلوب',
            'profit_ratio_2.numeric' => 'حقل نسبة الأرباح الداخلية يجب أن يكون رقم',
            'profit_ratio_2.min' => 'حقل نسبة الأرباح الداخلية يجب أن يكون أكبر من الصفر',
            'geolocation.required' => 'حقل الموقع مطلوب',

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
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
}
