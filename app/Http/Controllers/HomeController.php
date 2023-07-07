<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $previousPage = $_SERVER['HTTP_REFERER'];
        // $previousPage = $_SERVER['HTTP_REFERER'];
        // $previousPage = $_SERVER['HTTP_REFERER'];

        // dd($previousPage);
        // return Redirect::to($previousPage); 
        return view('user.home');
    }
}
