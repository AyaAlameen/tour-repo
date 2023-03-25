<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//admin routes part

Route::get('/', function () {
    return view('admin.dashboared');
})-> name('home');

Route::get('/employee', function () {
    return view('admin.employee');
}) -> name('employee');

Route::get('/cat', function () {
    return view('admin.categories');
}) -> name('category');

Route::post('/category', [CategoryController::class, 'store'])->name('addCategory');


Route::get('/sub_cat', function () {
    return view('admin.sub_cat');
}) -> name('sub_category');

Route::get('/place', function () {
    return view('admin.places');
}) -> name('place');

Route::get('/cities', function () {
    return view('admin.cities');
}) -> name('city');

Route::get('/offers', function () {
    return view('admin.offers');
}) -> name('offer');

Route::get('/services', function () {
    return view('admin.services');
}) -> name('service');

Route::get('/dist', function () {
    return view('admin.districts');
}) -> name('dist');

Route::get('/events', function () {
    return view('admin.events');
}) -> name('event');

Route::get('/booking', function () {
    return view('admin.bookings');
}) -> name('booking');

Route::get('/tourist_guide', function () {
    return view('admin.tourist_guide');
}) -> name('tourist_guide');

Route::get('/transport_companies', function () {
    return view('admin.transport_companies');
}) -> name('transport_company');

Route::get('/groups', function () {
    return view('admin.groups');
}) -> name('groupe');

//user routes part


Route::get('/home', function () {
    return view('user.home');
})-> name('userhome');

Route::get('/about', function () {
    return view('user.about');
})-> name('about');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

