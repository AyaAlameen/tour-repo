<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $messages = Message::with('user')->where('seen', 0)->get();

        return view('admin-Ar.dashboared', ['messages' => $messages]);

    }
    public function indexEn()
    {
        $messages = Message::with('user')->get();

        return view('admin-En.messages', ['messages' => $messages]);

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
            'message' => 'required',
        ], [
            'message.required' => 'يرجى إدخال محتوى الرسالة',
        ]);
        

        $message = new Message;

        
        $message->user_id = \Auth::id() ?? null;
        $message->message = $request->input('message');
        
        $message->save();


        return view('user-ar.contact');


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
        $data=$request->input();

        $message = Message::find($data['id']);

        $message->delete();

        $messages = Message::with('user')->get();
        
        return view("admin-Ar.sections.message-section")->with(['messages' => $messages]);
    }


    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $message = Message::find($data['id']);

        $message->delete();

        $messages = Message::with('user')->get();
        
        return view("admin-En.sections.message-section")->with(['messages' => $messages]);
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

        $messages = Message::with('user')->get();
        
        return view("admin-Ar.sections.message-section")->with(['messages' => $messages]);
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

        $messages = Message::with('user')->get();
        
        return view("admin-En.sections.message-section")->with(['messages' => $messages]);
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

        $messages = Message::with('user')->get();
        
        return view("admin-Ar.sections.message-section")->with(['messages' => $messages]);
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

        $messages = Message::with('user')->get();
        
        return view("admin-En.sections.message-section")->with(['messages' => $messages]);
    }
}
