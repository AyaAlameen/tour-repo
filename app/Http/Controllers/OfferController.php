<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Place;
use App\Models\Service;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();

        return view('admin-Ar.offers', ['offers' => $offers, 'places' => $places, 'services' => $services]);


    }
    
    public function indexEn()
    {
        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();

        return view('admin-En.offers', ['offers' => $offers, 'places' => $places, 'services' => $services]);



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
            // 'service_id' => 'required',
            'cost' => 'required|numeric|min:1',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'place_id.required' => 'حقل المكان مطلوب',

            'cost.required' => 'حقل التكلفة مطلوب',
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون نفس تاريخ البداية أو بعده',
        ]);
        

        $offer = new Offer;

        $offer->place_id = $request->input('place_id');
        $offer->service_id = $request->input('service_id');
        $offer->cost = $request->input('cost');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/offerImage', $upload_image_name);
            $offer->image = 'uploads/offerImage/'.$upload_image_name;
        }

        $offer->save();

        $offer->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $offer->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-Ar.sections.offer-section")->with(['offers' => $offers, 'places' => $places, 'services' => $services]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'place_id' => 'required',
            // 'service_id' => 'required',
            'cost' => 'required|numeric|min:1',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'place_id.required' => 'Place feild is required',
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than 0',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date',
            'end_date.after_or_equal' => 'End date field must be the same as or later than the start date',
        ]);
        

        $offer = new Offer;

        $offer->place_id = $request->input('place_id');
        $offer->service_id = $request->input('service_id');
        $offer->cost = $request->input('cost');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/offerImage', $upload_image_name);
            $offer->image = 'uploads/offerImage/'.$upload_image_name;
        }

        $offer->save();

        $offer->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $offer->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-En.sections.offer-section")->with(['offers' => $offers, 'places' => $places, 'services' => $services]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {
        // dd($request);
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'place_id' => 'required',
            // 'service_id' => 'required',
            'cost' => 'required|numeric|min:1',
            // 'start_date' => 'required|date|after:today',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [ 
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'place_id.required' => 'حقل المكان مطلوب',
            'cost.required' => 'حقل التكلفة مطلوب',
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون نفس تاريخ البداية أو بعده',
        ]);

        
        $offer = Offer::find($data['id']);

        $offer->place_id = $request->input('place_id');
        $offer->service_id = $request->input('service_id');
        $offer->cost = $request->input('cost');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/offerImage', $upload_image_name);
            $offer->image = 'uploads/offerImage/'.$upload_image_name;
        }
        
        $offer->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $offer->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $offer->update();
        
        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-Ar.sections.offer-section")->with(['offers' => $offers, 'places' => $places, 'services' => $services]);

    }

    public function updateEn(Request $request)
    {
        // dd($request);
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'place_id' => 'required',
            // 'service_id' => 'required',
            'cost' => 'required|numeric|min:1',
            // 'start_date' => 'required|date|after:today',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [ 
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'place_id.required' => 'Place feild is required',
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than 0',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date',
            'end_date.after_or_equal' => 'End date field must be the same as or later than the start date',
        ]);

        
        $offer = Offer::find($data['id']);

        $offer->place_id = $request->input('place_id');
        $offer->service_id = $request->input('service_id');
        $offer->cost = $request->input('cost');
        $offer->start_date = $request->input('start_date');
        $offer->end_date = $request->input('end_date');

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/offerImage', $upload_image_name);
            $offer->image = 'uploads/offerImage/'.$upload_image_name;
        }
        
        $offer->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $offer->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $offer->update();
        
        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-En.sections.offer-section")->with(['offers' => $offers, 'places' => $places, 'services' => $services]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $offer = Offer::find($data['id']);
        $offer->translations()->delete();
        $offer->delete();

        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-Ar.sections.offer-section")->with(['offers' => $offers, 'places' => $places, 'services' => $services]);


    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $offer = Offer::find($data['id']);
        $offer->translations()->delete();
        $offer->delete();

        $offers = Offer::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-En.sections.offer-section")->with(['offers' => $offers, 'places' => $places, 'services' => $services]);


    }
}
