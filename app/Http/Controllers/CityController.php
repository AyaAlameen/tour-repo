<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\District;
use App\Models\Place;
use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $cities = City::with('translations')->get();
        return view('admin-Ar.sections.city-section', compact('cities'));

    }
    
    public function indexEn()
    {
        $cities = City::with('translations')->get();
        return view('admin-En.sections.city-section', compact('cities'));

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

        $city = new City;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/cityImage', $upload_image_name);
            $city->image = 'uploads/cityImage/'.$upload_image_name;
        }
        $city->save();

        $city->translations()->create(['name'=>$request->input('name_en'), 'description' => $request->input('description_en'), 'locale' => 'en']);
        $city->translations()->create(['name'=>$request->input('name_ar'), 'description' => $request->input('description_ar'), 'locale' => 'ar']);
        $cities = City::with('translations')->get();
        
        return view("admin-Ar.sections.city-section")->with(['cities' => $cities]);


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

        $city = new City;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/cityImage', $upload_image_name);
            $city->image = 'uploads/cityImage/'.$upload_image_name;
        }
        $city->save();

       
        $city->translations()->create(['name'=>$request->input('name_en'), 'description' => $request->input('description_en'), 'locale' => 'en']);
        $city->translations()->create(['name'=>$request->input('name_ar'), 'description' => $request->input('description_ar'), 'locale' => 'ar']);
        $cities = City::with('translations')->get();
        
        return view("admin-En.sections.city-section")->with(['cities' => $cities]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
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

        $city = City::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/cityImage', $upload_image_name);
            $city->image = 'uploads/cityImage/'.$upload_image_name;
        }

        $city->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $city->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $city->update();
        
        $cities = City::with('translations')->get();
        
        return view("admin-Ar.sections.city-section")->with(['cities' => $cities]);
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

        $city = City::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/cityImage', $upload_image_name);
            $city->image = 'uploads/cityImage/'.$upload_image_name;
        }

        $city->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $city->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $city->update();
        
        $cities = City::with('translations')->get();
        
        return view("admin-En.sections.city-section")->with(['cities' => $cities]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $city = City::find($data['id']);
        $city->translations()->delete();
        $city->delete();

        $cities = City::with('translations')->get();
        
        return view("admin-Ar.sections.city-section")->with(['cities' => $cities]);
    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $city = City::find($data['id']);
        $city->translations()->delete();
        $city->delete();

        $cities = City::with('translations')->get();
        
        return view("admin-En.sections.city-section")->with(['cities' => $cities]);
    }


    public function cityDetailsAr($id)
    {
        $city = City::find($id);
        $districts_ids = District::where('city_id', $id)->get()->pluck('id');
        

        $Category_places = place::with(['subCategory.category' => function($query) {
            $query->with('subCategories');
        }])->whereHas('district', function($q) use($districts_ids){
            $q->whereIn('district_id', $districts_ids);
        })->get()->groupBy('subCategory.category.id');


        return view('user-ar.city')->with(['city' => $city, 'Category_places' => $Category_places]);
    }

    public function cityDetailsEn($id)
    {
        $city = City::find($id);
        $districts_ids = District::where('city_id', $id)->get()->pluck('id');
        

        $Category_places = place::with(['subCategory.category' => function($query) {
            $query->with('subCategories');
        }])->whereHas('district', function($q) use($districts_ids){
            $q->whereIn('district_id', $districts_ids);
        })->get()->groupBy('subCategory.category.id');


        return view('user.city')->with(['city' => $city, 'Category_places' => $Category_places]);
    }

    public function getSubCategoryPlaceAr(Request $request){
        // dd($request->all());
        if($request->input('sub_category_id') === 'all'){
            $places = Place::whereHas('district', function($query) use($request){
                    $query->where('city_id', $request->input('city_id'));
                } 
            )->whereHas('subCategory', function($query) use($request){
                    $query->where('category_id', $request->input('category_id'));
                }  
            )->get();
        }
        else{
            $places = Place::where('sub_category_id', $request->input('sub_category_id'))->whereHas('district', function($query) use($request){
                    $query->where('city_id', $request->input('city_id'));
                } 
            )->whereHas('subCategory', function($query) use($request){
                    $query->where('category_id', $request->input('category_id'));
                } 
            )->get();
        }
        
        $city = City::find($request->input('city_id'));
        return view("user-ar.sections.city-places")->with(['places' => $places, 'city' => $places]);


    }

    public function getSubCategoryPlaceEn(Request $request){
        // dd($request->all());
        if($request->input('sub_category_id') === 'all'){
            $places = Place::whereHas('district', function($query) use($request){
                    $query->where('city_id', $request->input('city_id'));
                } 
            )->whereHas('subCategory', function($query) use($request){
                    $query->where('category_id', $request->input('category_id'));
                }  
            )->get();
        }
        else{
            $places = Place::where('sub_category_id', $request->input('sub_category_id'))->whereHas('district', function($query) use($request){
                    $query->where('city_id', $request->input('city_id'));
                } 
            )->whereHas('subCategory', function($query) use($request){
                    $query->where('category_id', $request->input('category_id'));
                } 
            )->get();
        }
        
        $city = City::find($request->input('city_id'));
        return view("user.sections.city-places")->with(['places' => $places, 'city' => $places]);


    }
}
