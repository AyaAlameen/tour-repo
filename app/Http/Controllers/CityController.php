<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

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
            'image' =>'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $city = new City;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/cityImage', $upload_image_name);
            $city->image = 'uploads/cityImage/'.$upload_image_name;
        }
        $city->save();

        $city->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $city->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
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
            'image' =>'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $city = new City;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/cityImage', $upload_image_name);
            $city->image = 'uploads/cityImage/'.$upload_image_name;
        }
        $city->save();

        $city->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $city->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
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
            'name'=>  $data['name_en']
        ]);
        $city->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
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
            'name'=>  $data['name_en']
        ]);
        $city->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
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
}
