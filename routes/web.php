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

//admin routes part English

// Route::get('/', function () {
//     return view('admin-En.dashboared');
// })-> name('home');

// Route::get('/employee', function () {
//     return view('admin-En.employee');
// }) -> name('employee');

// Route::get('/cat', function () {
//     return view('admin-En.categories');
// }) -> name('category');

// Route::get('/sub_cat', function () {
//     return view('admin-En.sub_cat');
// }) -> name('sub_category');

// Route::get('/place', function () {
//     return view('admin-En.places');
// }) -> name('place');

// Route::get('/cities', function () {
//     return view('admin-En.cities');
// }) -> name('city');

// Route::get('/offers', function () {
//     return view('admin-En.offers');
// }) -> name('offer');

// Route::get('/services', function () {
//     return view('admin-En.services');
// }) -> name('service');

// Route::get('/dist', function () {
//     return view('admin-En.districts');
// }) -> name('dist');

// Route::get('/events', function () {
//     return view('admin-En.events');
// }) -> name('event');

// Route::get('/booking', function () {
//     return view('admin-En.bookings');
// }) -> name('booking');

// Route::get('/tourist_guide', function () {
//     return view('admin-En.tourist_guide');
// }) -> name('tourist_guide');

// Route::get('/transport_companies', function () {
//     return view('admin-En.transport_companies');
// }) -> name('transport_company');

// Route::get('/groups', function () {
//     return view('admin-En.groups');
// }) -> name('groupe');


//admin routes part Arabic


Route::get('/', function () {
    return view('admin-Ar.dashboared');
})-> name('home');

Route::get('/employee', function () {
    return view('admin-Ar.employee');
}) -> name('employee');

Route::get('/cat', function () {
    return view('admin-Ar.categories');
}) -> name('category');

Route::post('/category', [CategoryController::class, 'store'])->name('addCategory');


Route::get('/sub_cat', function () {
    return view('admin-Ar.sub_cat');
}) -> name('sub_category');

Route::get('/place', function () {
    return view('admin-Ar.places');
}) -> name('place');

Route::get('/cities', function () {
    return view('admin-Ar.cities');
}) -> name('city');

Route::get('/offers', function () {
    return view('admin-Ar.offers');
}) -> name('offer');

Route::get('/services', function () {
    return view('admin-Ar.services');
}) -> name('service');

Route::get('/dist', function () {
    return view('admin-Ar.districts');
}) -> name('dist');

Route::get('/events', function () {
    return view('admin-Ar.events');
}) -> name('event');

Route::get('/booking', function () {
    return view('admin-Ar.bookings');
}) -> name('booking');

Route::get('/tourist_guide', function () {
    return view('admin-Ar.tourist_guide');
}) -> name('tourist_guide');

Route::get('/transport_companies', function () {
    return view('admin-Ar.transport_companies');
}) -> name('transport_company');

Route::get('/groups', function () {
    return view('admin-Ar.groups');
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

