<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Place;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $services = Service::with('translations')->get();
        $places = Place::with('translations')->get();

        return view('admin-Ar.services', ['services' => $services, 'places' => $places]);


    }
    
    public function indexEn()
    {
        $services = Service::with('translations')->get();
        $places = Place::with('translations')->get();

        return view('admin-En.services', ['services' => $services, 'places' => $places]);

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
        // dd($request->all());
        $data=$request->input();
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'place_id' => 'required',
            'image' => 'required',
            'cost' => 'required|numeric|min:1',
            'is_additional' => 'required|boolean',
            
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'place_id.required' => 'حقل المكان مطلوب',
            'image.required' => 'حقل الصورة مطلوب',
        
            'cost.required' => 'حقل التكلفة مطلوب',
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',

            'is_additional.required' => 'حقل الإضافية مطلوب',
            'is_additional.boolean' => 'حقل الإضافية يجب أن يكون إما نعم أو لا',

        ]);
        

        $service = new Service;

        $service->place_id = $request->input('place_id');
        $service->cost = $request->input('cost');
        $service->is_additional = $request->input('is_additional');

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/serviceImage', $upload_image_name);
            $service->image = 'uploads/serviceImage/'.$upload_image_name;
        }
        $service->save();
        

        
// dd($place);
        $service->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $service->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $services = Service::with('translations')->get();
        $places = Place::with('translations')->get();

        
        return view("admin-Ar.sections.service-section")->with(['services' => $services, 'places' => $places]);


    }

    public function storeEn(Request $request)
    {
        // dd($request->all());
        $data=$request->input();
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'place_id' => 'required',
            'cost' => 'required|numeric|min:1',
            'is_additional' => 'required|boolean',
            
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'place_id.required' => 'Place feild is required',
        
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than zero',

            'is_additional.required' => 'Is Additional feild is required',
            'is_additional.boolean' => 'Is Additional field must be either yes or no',

        ]);
        

        $service = new Service;

        $service->place_id = $request->input('place_id');
        $service->cost = $request->input('cost');
        $service->is_additional = $request->input('is_additional');
        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/serviceImage', $upload_image_name);
            $service->image = 'uploads/serviceImage/'.$upload_image_name;
        }
        $service->save();
        

        
// dd($place);
        $service->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $service->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $services = Service::with('translations')->get();
        $places = Place::with('translations')->get();

        
        return view("admin-En.sections.service-section")->with(['services' => $services, 'places' => $places]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $service = Service::find($data['id']);
        $service->translations()->delete();
        $service->images()->delete();
        $service->delete();

        $services = Service::with('translations')->get();
        $places = Place::with('translations')->get();
        
        return view("admin-Ar.sections.service-section")->with(['services' => $services, 'places' => $places]);


    }

    public function destroyEn(Request $request)
    { $data=$request->input();

        $service = Service::find($data['id']);
        $service->translations()->delete();
        $service->images()->delete();
        $service->delete();

        $services = Service::with('translations')->get();
        $places = Place::with('translations')->get();
        
        return view("admin-En.sections.service-section")->with(['services' => $services, 'places' => $places]);

    }
}
