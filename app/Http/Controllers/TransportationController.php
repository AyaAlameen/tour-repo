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
            'carId' => ['required', 'numeric', 'digits:6'],
            'city_id' => 'required',
            'passengers_number' => ['required', 'numeric'],
        ], [
            'transport_company_id.required' => 'حقل شركة النقل مطلوب',
            'carId.required' => 'حقل رقم السيارة مطلوب',
            'carId.numeric' => 'حقل رقم السيارة يجب أن يتكون من أرقام فقط',
            'carId.digits' => 'حقل رقم السيارة يجب أن يتكون من 6 خانات',
            'city_id.required' => 'حقل المحافظة مطلوب',
            'passengers_number.required' => 'حقل عدد الركاب مطلوب',
            'passengers_number.numeric' => 'حقل عدد الركاب يجب أن يتكون من أرقام فقط',
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
            'transport_company_id' => 'required',
            'carId' => ['required', 'numeric', 'digits:6'],
            'city_id' => 'required',
            'passengers_number' => ['required', 'numeric'],
        ], [
            'transport_company_id.required' => 'Transport Company feild is required',
            'carId.required' => 'Car ID feild is required',
            'carId.numeric' => 'Car Id field must consist of numbers only',
            'carId.digits' => 'Car ID field must contain 6 characters',
            'city_id.required' => 'City feild is required',
            'passengers_number.required' => 'Passengers Number feild is required',
            'passengers_number.numeric' => 'Passengers Number field must consist of numbers only',
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
        
        return view("admin-En.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company]);


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
    public function updateAr(Request $request)
    {

        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'transport_company_id' => 'required',
            'carId' => ['required', 'numeric', 'digits:6'],
            'city_id' => 'required',
            'passengers_number' => ['required', 'numeric'],
        ], [
            'transport_company_id.required' => 'حقل شركة النقل مطلوب',
            'carId.required' => 'حقل رقم السيارة مطلوب',
            'carId.numeric' => 'حقل رقم السيارة يجب أن يتكون من أرقام فقط',
            'carId.digits' => 'حقل رقم السيارة يجب أن يتكون من 6 خانات',
            'city_id.required' => 'حقل المحافظة مطلوب',
            'passengers_number.required' => 'حقل عدد الركاب مطلوب',
            'passengers_number.numeric' => 'حقل عدد الركاب يجب أن يتكون من أرقام فقط',
        ]);

        $transportation = Transportation::find($data['id']);

        $transportation->transport_company_id = $request->input('transport_company_id');
        $transportation->carId = $request->input('carId');
        $transportation->city_id = $request->input('city_id');
        $transportation->passengers_number = $request->input('passengers_number');

        $transportation->translations()->where('locale', 'en')->update([
            'description'=>$request->input('description_en')
        ]);
        $transportation->translations()->where('locale', 'ar')->update([
            'description'=>$request->input('description_ar')
        ]);
        
        $transportation->update();
        
        $transportations = Transportation::with('translations')->where('transport_company_id', $data['transport_company_id'])->get();
        $company = TransportCompany::find($data['transport_company_id']);
        $cities = City::all();

        return view("admin-Ar.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company, 'city' => $cities]);

    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'transport_company_id' => 'required',
            'carId' => ['required', 'numeric', 'digits:6'],
            'city_id' => 'required',
            'passengers_number' => ['required', 'numeric'],
        ], [
            'transport_company_id.required' => 'Transport Company feild is required',
            'carId.required' => 'Car ID feild is required',
            'carId.numeric' => 'Car Id field must consist of numbers only',
            'carId.digits' => 'Car ID field must contain 6 characters',
            'city_id.required' => 'City feild is required',
            'passengers_number.required' => 'Passengers Number feild is required',
            'passengers_number.numeric' => 'Passengers Number field must consist of numbers only',
        ]);

        $transportation = Transportation::find($data['id']);

        $transportation->transport_company_id = $request->input('transport_company_id');
        $transportation->carId = $request->input('carId');
        $transportation->city_id = $request->input('city_id');
        $transportation->passengers_number = $request->input('passengers_number');

        $transportation->translations()->where('locale', 'en')->update([
            'description'=>$request->input('description_en')
        ]);
        $transportation->translations()->where('locale', 'ar')->update([
            'description'=>$request->input('description_ar')
        ]);
        
        $transportation->update();
        
        $transportations = Transportation::with('translations')->where('transport_company_id', $data['transport_company_id'])->get();
        $company = TransportCompany::find($data['transport_company_id']);
        $cities = City::all();

        return view("admin-En.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company, 'city' => $cities]);

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

        $transportations = Transportation::with('translations')->where('transport_company_id', $data['transport_company_id'])->get();
        $company = TransportCompany::find($data['transport_company_id']);
        $cities = City::all();

        return view("admin-Ar.sections.transportation-section")->with(['transportations' => $transportations, 'company' => $company, 'city' => $cities]);

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
