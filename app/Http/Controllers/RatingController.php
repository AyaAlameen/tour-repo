<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Place;
use Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function startsPlaceAr(Request $request)
    {
        // dd($request->all());
        $star = Rating::where('user_id', Auth::user()->id)->where('place_id', $request->input('place_id'))->first();
        if($star) {
            $star->stars = $request->input('stars');
            $star->update();
        }
        else{
            $star = new Rating;
            $star->place_id = $request->input('place_id');
            $star->user_id = Auth::user()->id;
            $star->stars = $request->input('stars');
            $star->save();
        }
    }

    public function reviewsPlaceAr(Request $request)
    {
        // dd($request->all());
       
            $review = new Rating;
            $review->place_id = $request->input('place_id');
            $review->user_id = Auth::user()->id;
            $review->reviews = $request->input('reviews');
            $review->save();
            $place = Place::find($request->input('place_id'));
            $comments = Rating::where('place_id', $request->input('place_id'))->latest()->take(4)->get();
            return view("user-ar.sections.comment-section")->with(['place' => $place, 'comments' => $comments]);

    }

    public function reviewsPlaceEn(Request $request)
    {
        // dd($request->all());
       
            $review = new Rating;
            $review->place_id = $request->input('place_id');
            $review->user_id = Auth::user()->id;
            $review->reviews = $request->input('reviews');
            $review->save();
            $place = Place::find($request->input('place_id'));
            $comments = Rating::where('place_id', $request->input('place_id'))->latest()->take(4)->get();
            return view("user.sections.comment-section")->with(['place' => $place, 'comments' => $comments]);

    }

    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
