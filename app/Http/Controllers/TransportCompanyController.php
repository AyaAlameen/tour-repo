<?php

namespace App\Http\Controllers;

use App\Models\TransportCompany;
use Illuminate\Http\Request;

class TransportCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $companies = TransportCompany::with('translations')->get();
        return view('admin-Ar.sections.transport-company-section', compact('companies'));
    }

    public function indexEn()
    {
        $companies = TransportCompany::with('translations')->get();
        return view('admin-En.sections.transport-company-section', compact('companies'));

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:transport_companies'],
            'phone' => ['required', 'numeric', 'digits:10']
        ]);
        // $company = new TransportCompany;
        $company = TransportCompany::create($request->input());
        // $category->save();

        $company->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $company->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
        $companies = TransportCompany::with('translations')->get();
        
        return view("admin-Ar.sections.transport-company-section")->with(['companies' => $companies]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:transport_companies'],
            'phone' => ['required', 'numeric', 'digits:10']
        ]);
        // $company = new TransportCompany;
        $company = TransportCompany::create($request->input());
        // $category->save();

        $company->translations()->create(['name'=>$request->input('name_en'), 'locale' => 'en']);
        $company->translations()->create(['name'=>$request->input('name_ar'), 'locale' => 'ar']);
        $companies = TransportCompany::with('translations')->get();
        
        return view("admin-En.sections.transport-company-section")->with(['companies' => $companies]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransportCompany  $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function show(TransportCompany $transportCompany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransportCompany  $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function edit(TransportCompany $transportCompany)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransportCompany  $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {

        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10']
        ]);

        $company = TransportCompany::find($data['id']);


        $company->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $company->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);

        $company->fill($request->input())->save();

        
        $companies = TransportCompany::with('translations')->get();
        
        return view("admin-Ar.sections.transport-company-section")->with(['companies' => $companies]);
    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:10']
        ]);

        $company = TransportCompany::find($data['id']);


        $company->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $company->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);

        $company->fill($request->input())->save();

        
        $companies = TransportCompany::with('translations')->get();
        
        return view("admin-En.sections.transport-company-section")->with(['companies' => $companies]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransportCompany  $transportCompany
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $company = TransportCompany::find($data['id']);
        $company->translations()->delete();
        $company->delete();

        $companies = TransportCompany::with('translations')->get();
        
        return view("admin-Ar.sections.transport-company-section")->with(['companies' => $companies]);
    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $company = TransportCompany::find($data['id']);
        $company->translations()->delete();
        $company->delete();

        $companies = TransportCompany::with('translations')->get();
        
        return view("admin-En.sections.transport-company-section")->with(['companies' => $companies]);
    }
}
