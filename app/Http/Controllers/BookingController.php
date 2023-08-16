<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Offer;
use Auth;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPlaceAr()
    {
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $bookings = Booking::where('model_type', 'App\Models\Place')->where('model_id', $place_id)->get();
            // dd($bookings);
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Place')->get();
        }

        return view("admin-Ar.sections.booking-place-section")->with(['bookings' => $bookings]);
 
    }
    public function indexPlaceEn()
    {
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $bookings = Booking::where('model_type', 'App\Models\Place')->where('model_id', $place_id)->get();
            // dd($bookings);
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Place')->get();
        }

        return view("admin-En.sections.booking-place-section")->with(['bookings' => $bookings]);
 
    }
    public function indexServiceAr()
    {
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $services_ids = Service::where('place_id', $place_id)->get()->pluck('id');

            $bookings = Booking::where('model_type', 'App\Models\Service')->whereIn('model_id', $services_ids)->get();
            // dd($bookings);
            $services = Service::where('place_id', $place_id)->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Service')->get();
            $services = Service::all();
        }

        

        return view("admin-Ar.sections.booking-service-section")->with(['bookings' => $bookings, 'services' => $services]);
 
    }
    public function indexServiceEn()
    {
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $services_ids = Service::where('place_id', $place_id)->get()->pluck('id');

            $bookings = Booking::where('model_type', 'App\Models\Service')->whereIn('model_id', $services_ids)->get();
            // dd($bookings);
            $services = Service::where('place_id', $place_id)->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Service')->get();
            $services = Service::all();
        }

        

        return view("admin-En.sections.booking-service-section")->with(['bookings' => $bookings, 'services' => $services]);
 
    }
    public function indexOfferAr()
    {
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $offers_ids = Offer::where('place_id', $place_id)->get()->pluck('id');

            $bookings = Booking::where('model_type', 'App\Models\Offer')->whereIn('model_id', $offers_ids)->get();
            // dd($bookings);
            $offers = Offer::where('place_id', $place_id)->where('end_date','>=', now()->format('Y-m-d'))->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Offer')->get();
            $offers = Offer::where('end_date','>=', now()->format('Y-m-d'))->get();
        }

        

        return view("admin-Ar.sections.booking-offer-section")->with(['bookings' => $bookings, 'offers' => $offers]);
 
    }
    public function indexOfferEn()
    { if (Auth::user()->is_employee == 2) {
        $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
        $offers_ids = Offer::where('place_id', $place_id)->get()->pluck('id');

        $bookings = Booking::where('model_type', 'App\Models\Offer')->whereIn('model_id', $offers_ids)->get();
        // dd($bookings);
        $offers = Offer::where('place_id', $place_id)->where('end_date','>=', now()->format('Y-m-d'))->get();
    }
    elseif(Auth::user()->is_employee == 1){
        $bookings = Booking::where('model_type', 'App\Models\Offer')->get();
        $offers = Offer::where('end_date','>=', now()->format('Y-m-d'))->get();
    }

    

    return view("admin-En.sections.booking-offer-section")->with(['bookings' => $bookings, 'offers' => $offers]);

    }
    public function getServicesAr()
    {
        $services;
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            // dd($bookings);
            $services = Service::where('place_id', $place_id)->get();
            // dd($services);
        }
        elseif(Auth::user()->is_employee == 1){
            $services = Service::all();
        }

        

        return view('admin-Ar.services_bookings')->with(['services' => $services]);
    }
    public function getServicesEn()
    {
        $services;
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            // dd($bookings);
            $services = Service::where('place_id', $place_id)->get();
            // dd($services);
        }
        elseif(Auth::user()->is_employee == 1){
            $services = Service::all();
        }

        

        return view('admin-En.services_bookings')->with(['services' => $services]);
    }
    public function getOffersAr()
    {
        $offers;
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            // dd($bookings);
            $offers = Offer::where('place_id', $place_id)->where('end_date','>=', now()->format('Y-m-d'))->get();
            // dd($services);
        }
        elseif(Auth::user()->is_employee == 1){
            $offers = Offer::where('end_date','>=', now()->format('Y-m-d'))->get();
        }

        

        return view('admin-Ar.offers_bookings')->with(['offers' => $offers]);
    }
    public function getOffersEn()
    {
        $offers;
        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            // dd($bookings);
            $offers = Offer::where('place_id', $place_id)->where('end_date','>=', now()->format('Y-m-d'))->get();
            // dd($services);
        }
        elseif(Auth::user()->is_employee == 1){
            $offers = Offer::where('end_date','>=', now()->format('Y-m-d'))->get();
        }

        

        return view('admin-En.offers_bookings')->with(['offers' => $offers]);
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
    public function storePlaceAr(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'start_date' => 'required|date|after:today',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'people_count.required' => 'حقل عدد الأشخاص مطلوب',
            'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
            'people_count.min' => 'حقل عدد الأشخاص يجب أن يكون أكبر من الصفر',

        ]);

        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->full_name = $request->input('full_name');
        $booking->people_count = $request->input('people_count');
        $booking->start_date = $request->input('start_date');
        $booking->cost = $request->input('cost');
        $booking->model_type =  'App\Models\Place';
        $booking->model_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
        $booking->save();

        if (Auth::user()->is_employee == 2) {
            $bookings = Booking::where('model_type', 'App\Models\Place')->where('model_id', \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id)->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Place')->get();
        }

        return view("admin-Ar.sections.booking-place-section")->with(['bookings' => $bookings]);
    }

    public function storePlaceEn(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'start_date' => 'required|date|after:today',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'Full Name feild is required',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'people_count.required' => 'People Count feild is required',
            'people_count.numeric' => 'People Count field must consist of numbers only',
            'people_count.min' => 'People Count field must be greater than 0',

        ]);

        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->full_name = $request->input('full_name');
        $booking->people_count = $request->input('people_count');
        $booking->start_date = $request->input('start_date');
        $booking->cost = $request->input('cost');
        $booking->model_type =  'App\Models\Place';
        $booking->model_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
        $booking->save();

        if (Auth::user()->is_employee == 2) {
            $bookings = Booking::where('model_type', 'App\Models\Place')->where('model_id', \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id)->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Place')->get();
        }

        return view("admin-En.sections.booking-place-section")->with(['bookings' => $bookings]);
    }

    public function storeServiceAr(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'service_id' => 'required',
            'start_date' => 'required|date|after:today',
            // 'end_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:today',
            // 'start_time' => 'required|time',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'service_id.required' => 'حقل الخدمة مطلوب',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            
            // 'start_time.required' => 'حقل الوقت مطلوب',
            // 'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            // 'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون بتاريخ اليوم أو بعد تاريخ اليوم',
            'people_count.required' => 'حقل عدد الأشخاص مطلوب',
            'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
            'people_count.min' => 'حقل عدد الأشخاص يجب أن يكون أكبر من الصفر',

        ]);

        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->full_name = $request->input('full_name');
        $booking->people_count = $request->input('people_count');
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->cost = $request->input('cost');
        $booking->model_type =  'App\Models\Service';
        $booking->model_id = $request->input('service_id');
        $booking->save();

        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $services_ids = Service::where('place_id', $place_id)->get()->pluck('id');
            $bookings = Booking::where('model_type', 'App\Models\Service')->whereIn('model_id', $services_ids)->get();
            // dd($bookings);
            $services = Service::where('place_id', $place_id)->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Service')->get();
            $services = Service::all();
        }

        

        return view("admin-Ar.sections.booking-service-section")->with(['bookings' => $bookings, 'services' => $services]);

    }

    public function storeServiceEn(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'service_id' => 'required',
            'start_date' => 'required|date|after:today',
            // 'end_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:today',
            // 'start_time' => 'required|time',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'Full Name feild is required',
            'service_id.required' => 'Service feild is required',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'people_count.required' => 'People Count feild is required',
            'people_count.numeric' => 'People Count field must consist of numbers only',
            'people_count.min' => 'People Count field must be greater than 0',
            
            // 'start_time.required' => 'حقل الوقت مطلوب',
            // 'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            // 'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date',
            'end_date.after_or_equal' => "Start date field must be after or equals today's date",
           

        ]);

        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->full_name = $request->input('full_name');
        $booking->people_count = $request->input('people_count');
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->cost = $request->input('cost');
        $booking->model_type =  'App\Models\Service';
        $booking->model_id = $request->input('service_id');
        $booking->save();

        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $services_ids = Service::where('place_id', $place_id)->get()->pluck('id');
            $bookings = Booking::where('model_type', 'App\Models\Service')->whereIn('model_id', $services_ids)->get();
            // dd($bookings);
            $services = Service::where('place_id', $place_id)->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Service')->get();
            $services = Service::all();
        }

        

        return view("admin-En.sections.booking-service-section")->with(['bookings' => $bookings, 'services' => $services]);

    }
    public function storeOfferAr(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'offer_id' => 'required',
            'start_date' => 'required|date|after:today',
            // 'end_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:today',
            // 'start_time' => 'required|time',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'حقل الاسم الكامل مطلوب',
            'offer_id.required' => 'حقل العرض مطلوب',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            
            // 'start_time.required' => 'حقل الوقت مطلوب',
            // 'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            // 'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون بتاريخ اليوم أو بعد تاريخ اليوم',
            'people_count.required' => 'حقل عدد الأشخاص مطلوب',
            'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
            'people_count.min' => 'حقل عدد الأشخاص يجب أن يكون أكبر من الصفر',

        ]);

//         $bookinOffers = Booking::where('model_id', $request->input('offer_id'))->where('model_type', 'App\Models\Offer')->get('people_count');
// $offer  = Offer::find($request->input('offer_id'));
// dd($bookinOffers, $offer);
        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->full_name = $request->input('full_name');
        $booking->people_count = $request->input('people_count');
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->cost = $request->input('cost');
        $booking->model_type =  'App\Models\Offer';
        $booking->model_id = $request->input('offer_id');
        $booking->save();

        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $offers_ids = Offer::where('place_id', $place_id)->get()->pluck('id');

            $bookings = Booking::where('model_type', 'App\Models\Offer')->whereIn('model_id', $offers_ids)->get();
            // dd($bookings);
            $offers = Offer::where('place_id', $place_id)->where('end_date','>=', now()->format('Y-m-d'))->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Offer')->get();
            $offers = Offer::where('end_date','>=', now()->format('Y-m-d'))->get();
        }

        

        return view("admin-Ar.sections.booking-offer-section")->with(['bookings' => $bookings, 'offers' => $offers]);
 
    }

    public function storeOfferEn(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'offer_id' => 'required',
            'start_date' => 'required|date|after:today',
            // 'end_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:today',
            // 'start_time' => 'required|time',
            'people_count' => ['required', 'numeric', 'min:1'],
            
        ], [
            'full_name.required' => 'Full Name feild is required',
            'offer_id.required' => 'Offer feild is required',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date',
            'start_date.after' => "Start date field must be after today's date",
            'people_count.required' => 'People Count feild is required',
            'people_count.numeric' => 'People Count field must consist of numbers only',
            'people_count.min' => 'People Count field must be greater than 0',
            
            // 'start_time.required' => 'حقل الوقت مطلوب',
            // 'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            // 'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date',
            'end_date.after_or_equal' => "Start date field must be after or equals today's date",
           

        ]);

        $booking = new Booking;
        $booking->user_id = Auth::user()->id;
        $booking->full_name = $request->input('full_name');
        $booking->people_count = $request->input('people_count');
        $booking->start_date = $request->input('start_date');
        $booking->end_date = $request->input('end_date');
        $booking->cost = $request->input('cost');
        $booking->model_type =  'App\Models\Offer';
        $booking->model_id = $request->input('offer_id');
        $booking->save();

        if (Auth::user()->is_employee == 2) {
            $place_id = \App\Models\UserPermission::where('user_id', \Auth::user()->id)->first()->place()->first()->id;
            $offers_ids = Offer::where('place_id', $place_id)->get()->pluck('id');

            $bookings = Booking::where('model_type', 'App\Models\Offer')->whereIn('model_id', $offers_ids)->get();
            // dd($bookings);
            $offers = Offer::where('place_id', $place_id)->where('end_date','>=', now()->format('Y-m-d'))->get();
        }
        elseif(Auth::user()->is_employee == 1){
            $bookings = Booking::where('model_type', 'App\Models\Offer')->get();
            $offers = Offer::where('end_date','>=', now()->format('Y-m-d'))->get();
        }

        

        return view("admin-En.sections.booking-offer-section")->with(['bookings' => $bookings, 'offers' => $offers]);
 
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
