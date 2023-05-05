<?php

namespace App\Http\Controllers;

use App\Models\Transportation;
use App\Models\TransportCompany;
use App\Models\City;
use Illuminate\Http\Request;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr($id)
    {
        $transportations = Transportation::with('translations')->where('transport_company_id', $id)->get();
        $company = TransportCompany::find($id);
        $cities = City::all();
        
        return view('admin-Ar.transportations', ['transportations' => $transportations, 'company' => $company, 'cities' => $cities]);
    }

    public function indexEn($id)
    {
        $transportations = Transportation::with('translations')->where('transport_company_id', $id)->get();
        $company = TransportCompany::find($id);
        $cities = City::all();
        return view('admin-En.transportations', ['transportations' => $transportations, 'company' => $company, 'cities' => $cities]);
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
            'transport_company_id' => 'required',
            'carId' => 'required',
            'city_id' => 'required',
            'passengers_number' => 'required',
        ], [
            'transport_company_id.required' => 'حقل شركة النقل مطلوب',
            'carId.required' => 'حقل رقم السيارة مطلوب',
            'city_id.required' => 'حقل المحافظة مطلوب',
            'passengers_number.required' => 'حقل عدد الركاب مطلوب',
        ]);
        $transportation = new Transportation;

        $transportation->transport_company_id = $request->input('transport_company_id');
        $transportation->carId = $request->input('carId');
        $transportation->city_id = $request->input('city_id');
        $transportation->passengers_number = $request->input('passengers_number');
        $transportation->save();

        $transportation->translations()->create(['description'=>$request->input('description_en'), 'locale' => 'en']);
        $transportation->translations()->create(['description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $transportations = Transportation::with('translations')->where('transport_company_id', $request->input('transport_company_id'))->get();
        $company = TransportCompany::find($request->input('transport_company_id'));
        
        return view("admin-Ar.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();

        //validation:
        $request->validate([
            'category_id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'image.required' => 'Image feild is required',
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
        
        return view("admin-En.sections.sub-category-section")->with(['subCategories' => $subCategories, 'category' => $category]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function show(Transportation $transportation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportation $transportation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportation $transportation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportation  $transportation
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'transport_company_id' => 'required',
        ]);

        $transportation = Transportation::find($data['id']);
        $transportation->translations()->delete();
        $transportation->delete();

        $transportations = Transportation::with('translations')->where('transport_company_id', $id)->get();
        $company = TransportCompany::find($id);
        $cities = City::all();

        return view("admin-Ar.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company, 'city' => $city]);

    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'transport_company_id' => 'required',
        ]);

        $transportation = Transportation::find($data['id']);
        $transportation->translations()->delete();
        $transportation->delete();

        $transportations = Transportation::with('translations')->where('transport_company_id', $id)->get();
        $company = TransportCompany::find($id);
        $cities = City::all();

        return view("admin-En.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company, 'city' => $city]);

    }
}
