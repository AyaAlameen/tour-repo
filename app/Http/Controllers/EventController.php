<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Place;
use App\Models\Service;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();

        return view('admin-Ar.events', ['events' => $events, 'places' => $places, 'services' => $services]);


    }
    
    public function indexEn()
    {
        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();

        return view('admin-En.events', ['events' => $events, 'places' => $places, 'services' => $services]);


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
            'place_id' => 'required',
            // 'service_id' => 'required',
            'cost' => 'numeric|min:1',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'place_id.required' => 'حقل المكان مطلوب',
        
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون نفس تاريخ البداية أو بعده',
        ]);
        

        $event = new Event;

        $event->place_id = $request->input('place_id');
        $event->service_id = $request->input('service_id');
        $event->cost = $request->input('cost');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        // $files = $request->files->all();
        $event->save();
        // if ($files) {
        //     foreach ($files as $name => $file) {
        //         // dd($name, $file);
        //         $upload_image_name = time().'_'.$file->getClientOriginalName();
        //         $file->move('uploads/eventImage', $upload_image_name);
        //         $event->images()->create( ['image' => "uploads/eventImage/$upload_image_name"]);
        //     }
        // }

        $event->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $event->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-Ar.sections.event-section")->with(['events' => $events, 'places' => $places, 'services' => $services]);


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
            'cost' => 'numeric|min:1',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'place_id.required' => 'Place feild is required',
        
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than 0',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date',
            'end_date.after_or_equal' => 'End date field must be the same as or later than the start date',
        ]);
        

        $event = new Event;

        $event->place_id = $request->input('place_id');
        $event->service_id = $request->input('service_id');
        $event->cost = $request->input('cost');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');
        $event->save();

        $event->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $event->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-En.sections.event-section")->with(['events' => $events, 'places' => $places, 'services' => $services]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
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
            'cost' => 'numeric|min:1',
            // 'start_date' => 'required|date|after:today',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [ 
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'place_id.required' => 'حقل المكان مطلوب',
        
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون نفس تاريخ البداية أو بعده',
        ]);

        
        $event = Event::find($data['id']);

        $event->place_id = $request->input('place_id');
        $event->service_id = $request->input('service_id');
        $event->cost = $request->input('cost');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');

        
        $event->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $event->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $event->update();
        
        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-Ar.sections.event-section")->with(['events' => $events, 'places' => $places, 'services' => $services]);

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
            'cost' => 'numeric|min:1',
            // 'start_date' => 'required|date|after:today',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], [ 
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'place_id.required' => 'Place feild is required',
        
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than 0',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date',
            'end_date.after_or_equal' => 'End date field must be the same as or later than the start date',
        ]);

        
        $event = Event::find($data['id']);

        $event->place_id = $request->input('place_id');
        $event->service_id = $request->input('service_id');
        $event->cost = $request->input('cost');
        $event->start_date = $request->input('start_date');
        $event->end_date = $request->input('end_date');

        
        $event->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $event->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $event->update();
        
        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-En.sections.event-section")->with(['events' => $events, 'places' => $places, 'services' => $services]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $event = Event::find($data['id']);
        $event->translations()->delete();
        $event->delete();

        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-Ar.sections.event-section")->with(['events' => $events, 'places' => $places, 'services' => $services]);


    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $event = Event::find($data['id']);
        $event->translations()->delete();
        $event->delete();

        $events = Event::with('translations')->get();
        $places = Place::with('translations')->get();
        $services = Service::with('translations')->get();
        
        return view("admin-En.sections.event-section")->with(['events' => $events, 'places' => $places, 'services' => $services]);


    }
}
