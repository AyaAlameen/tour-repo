<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Group;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $messages = Message::with('user')->where('seen', 0)->get();
        $month_groups = Group::whereMonth('start_date',  Carbon::now()->format('m'))->orwhereMonth('end_date',  Carbon::now()->format('m'))->get();
        $employee = User::where('is_employee', '1')->get();
        $place_employee = User::where('is_employee', '2')->get();
        $users = User::where('is_employee', '0')->get();
        
        return view('admin-Ar.dashboared', ['messages' => $messages, 'month_groups' => $month_groups, 'employee' => $employee, 'place_employee' => $place_employee, 'users' => $users]);

    }
    public function indexEn()
    {
        $messages = Message::with('user')->where('seen', 0)->get();
        $month_groups = Group::whereMonth('start_date',  Carbon::now()->format('m'))->orwhereMonth('end_date',  Carbon::now()->format('m'))->get();
        $employee = User::where('is_employee', '1')->get();
        $place_employee = User::where('is_employee', '2')->get();
        $users = User::where('is_employee', '0')->get();
        
        return view('admin-En.dashboared', ['messages' => $messages, 'month_groups' => $month_groups, 'employee' => $employee, 'place_employee' => $place_employee, 'users' => $users]);

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
        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        
    }

    


    public function destroyEn(Request $request)
    {
        
    }

    public function deleteMessageAr(Request $request){
        $data=$request->input();

        $message = Message::find($data['id']);

        $message->delete();

        $messages = Message::with('user')->where('seen', 0)->get();
        
        return view("admin-Ar.sections.dashboared-message-section")->with(['messages' => $messages]);
    }


    public function deleteMessageEn(Request $request){
        $data=$request->input();

        $message = Message::find($data['id']);

        $message->delete();

        $messages = Message::with('user')->where('seen', 0)->get();
        
        return view("admin-En.sections.dashboared-message-section")->with(['messages' => $messages]);
    }

    public function seenAr(Request $request){
        // dd($request);

        $data=$request->input();
        $message = Message::find($request->input('id'));

        if($request->has('seen')){
            $message->seen = 1;
        }
        else{
            $message->seen = 0;
        }
        $message->save();

        $messages = Message::with('user')->where('seen', 0)->get();
        
        return view("admin-Ar.sections.dashboared-message-section")->with(['messages' => $messages]);
    }
    public function seenEn(Request $request){
        // dd($request);

        $data=$request->input();
        $message = Message::find($request->input('id'));

        if($request->has('seen')){
            $message->seen = 1;
        }
        else{
            $message->seen = 0;
        }
        $message->save();

        $messages = Message::with('user')->where('seen', 0)->get();
        
        return view("admin-En.sections.dashboared-message-section")->with(['messages' => $messages]);
    }

    public function publishAr(Request $request){
        // dd($request);

        $data=$request->input();
        $message = Message::find($request->input('id'));

        if($request->has('publish')){
            $message->publish = 1;
        }
        else{
            $message->publish = 0;
        }
        $message->save();

        $messages = Message::with('user')->where('seen', 0)->get();
        
        return view("admin-Ar.sections.dashboared-message-section")->with(['messages' => $messages]);
    }
    public function publishEn(Request $request){
        // dd($request);

        $data=$request->input();
        $message = Message::find($request->input('id'));

        if($request->has('publish')){
            $message->publish = 1;
        }
        else{
            $message->publish = 0;
        }
        $message->save();

        $messages = Message::with('user')->where('seen', 0)->get();
        
        return view("admin-En.sections.dashboared-message-section")->with(['messages' => $messages]);
    }
}
