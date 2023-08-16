<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
