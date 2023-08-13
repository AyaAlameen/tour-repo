<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getGroupsAr()
    {
        $groups = Group::with(['translations', 'touristGuide', 'places' => function($query){
            $query->with(['images' => function($q){
                $q->first();
            }]);
        }])->get();
        return view('user-ar.trips', ['groups' => $groups]);

    }
    public function getGroupDetailsAr($id)
    {
        $group = Group::with(['translations', 'touristGuide', 'places' => function($query){
            $query->with(['images' => function($q){
                $q->first();
            }]);
        }])->find($id);
        return view('user-ar.tripmore', ['group' => $group]);

    }
    public function getGroupDetailsEn($id)
    {
        $group = Group::with(['translations', 'touristGuide', 'places' => function($query){
            $query->with(['images' => function($q){
                $q->first();
            }]);
        }])->find($id);
        return view('user.tripmore', ['group' => $group]);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
