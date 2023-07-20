<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\TouristGuide;
use App\Models\Offer;
use App\Models\Group;
use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $cities = City::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $offers = Offer::with('translations')->get();
        $groups = Group::with(['translations', 'touristGuide', 'places' => function($query){
            $query->with(['images' => function($q){
                $q->first();
            }]);
        }])->get();
// dd($groups);
        return view('user-ar.home', ['cities' => $cities, 'guides' => $guides, 'groups' => $groups]);

    }


    public function indexEn()
    {
        // dd('jkdck');
        $cities = City::with('translations')->get();
        return view('user.home', ['cities' => $cities]);
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
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Http\Response
     */
    public function show(TransportType $transportType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Http\Response
     */
    public function edit(TransportType $transportType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransportType $transportType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransportType  $transportType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransportType $transportType)
    {
        //
    }
}
