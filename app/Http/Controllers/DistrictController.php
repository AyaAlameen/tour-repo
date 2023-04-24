<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\City;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr($id)
    {
        $districts = District::with('translations')->where('city_id', $id)->get();
        $city = City::find($id);
        return view('admin-Ar.districts', ['districts' => $districts, 'city' => $city]);
    }

    public function indexEn($id)
    {
        $districts = District::with('translations')->where('city_id', $id)->get();
        $city = City::find($id);
        return view('admin-En.districts', ['districts' => $districts, 'city' => $city]);
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
            'city_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
        ]);
        $district = new District;

        $district->city_id = $request->input('city_id');
        $district->save();

        $district->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $district->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);

        $districts = District::with('translations')->where('city_id', $request->input('city_id'))->get();
        $city = City::find($request->input('city_id'));
        
        return view("admin-Ar.sections.district-section")->with(['districts' => $districts, 'city' => $city]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'city_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ]);
        $request->validate([
            'city_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
        ]);
        $district = new District;

        $district->city_id = $request->input('city_id');
        $district->save();

        $district->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $district->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);

        $districts = District::with('translations')->where('city_id', $request->input('city_id'))->get();
        $city = City::find($request->input('city_id'));
        
        return view("admin-En.sections.district-section")->with(['districts' => $districts, 'city' => $city]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {

        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'city_id' => 'required',
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
        ]);

        $district = District::find($data['id']);


        $district->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $district->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        $district->city_id = $request->input('city_id');
        
        $district->update();
        
        $districts = District::with('translations')->where('city_id', $request->input('city_id'))->get();
        $city = City::find($request->input('city_id'));
        
        return view("admin-Ar.sections.district-section")->with(['districts' => $districts, 'city' => $city]);

    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'city_id' => 'required',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
        ]);

        $district = District::find($data['id']);


        $district->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $district->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        $district->city_id = $request->input('city_id');
        
        $district->update();
        
        $districts = District::with('translations')->where('city_id', $request->input('city_id'))->get();
        $city = City::find($request->input('city_id'));
        
        return view("admin-En.sections.district-section")->with(['districts' => $districts, 'city' => $city]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'city_id' => 'required',
        ]);

        $district = District::find($data['id']);
        $district->translations()->delete();
        $district->delete();

        $districts = District::with('translations')->where('city_id', $request->input('city_id'))->get();
        $city = City::find($request->input('city_id'));
        
        return view("admin-Ar.sections.district-section")->with(['districts' => $districts, 'city' => $city]);

    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'city_id' => 'required',
        ]);

        $district = District::find($data['id']);
        $district->translations()->delete();
        $district->delete();

        $districts = District::with('translations')->where('city_id', $request->input('city_id'))->get();
        $city = City::find($request->input('city_id'));
        
        return view("admin-En.sections.district-section")->with(['districts' => $districts, 'city' => $city]);

    }
}
