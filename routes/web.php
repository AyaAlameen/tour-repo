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

Route::get('/home_en', function () {
    return view('admin-En.dashboared');
})-> name('home_en');

Route::get('/employee_en', function () {
    return view('admin-En.employee');
}) -> name('employee_en');

Route::get('/cat_en', function () {
    return view('admin-En.categories');
}) -> name('category_en');

Route::get('/sub_cat_en', function () {
    return view('admin-En.sub_cat');
}) -> name('sub_category_en');

Route::get('/place_en', function () {
    return view('admin-En.places');
}) -> name('place_en');

Route::get('/cities_en', function () {
    return view('admin-En.cities');
}) -> name('city_en');

Route::get('/offers_en', function () {
    return view('admin-En.offers');
}) -> name('offer_en');

Route::get('/services_en', function () {
    return view('admin-En.services');
}) -> name('service_en');

Route::get('/dist_en', function () {
    return view('admin-En.districts');
}) -> name('dist_en');

Route::get('/events_en', function () {
    return view('admin-En.events');
}) -> name('event_en');

Route::get('/booking_en', function () {
    return view('admin-En.bookings');
}) -> name('booking_en');

Route::get('/tourist_guide_en', function () {
    return view('admin-En.tourist_guide');
}) -> name('tourist_guide_en');

Route::get('/transport_companies_en', function () {
    return view('admin-En.transport_companies');
}) -> name('transport_company_en');

Route::get('/groups_en', function () {
    return view('admin-En.groups');
}) -> name('groupe_en');


//admin routes part Arabic


Route::get('/home_ar', function () {
    return view('admin-Ar.dashboared');
})-> name('home_ar');

Route::get('/employee_ar', function () {
    return view('admin-Ar.employee');
}) -> name('employee_ar');

Route::get('/cat_ar', function () {
    return view('admin-Ar.categories');
}) -> name('category_ar');


Route::get('/ar/categories', [CategoryController::class, 'index']) -> name('getCategories');
Route::post('/cat_ar', [CategoryController::class, 'store']) -> name('addCategory');

// Route::post('/category', [CategoryController::class, 'store'])->name('addCategory');

Route::get('/sub_cat_ar', function () {
    return view('admin-Ar.sub_cat');
}) -> name('sub_category_ar');

Route::get('/place_ar', function () {
    return view('admin-Ar.places');
}) -> name('place_ar');

Route::get('/cities_ar', function () {
    return view('admin-Ar.cities');
}) -> name('city_ar');

Route::get('/offers_ar', function () {
    return view('admin-Ar.offers');
}) -> name('offer_ar');

Route::get('/services_ar', function () {
    return view('admin-Ar.services');
}) -> name('service_ar');

Route::get('/dist_ar', function () {
    return view('admin-Ar.districts');
}) -> name('dist_ar');

Route::get('/events_ar', function () {
    return view('admin-Ar.events');
}) -> name('event_ar');

Route::get('/booking_ar', function () {
    return view('admin-Ar.bookings');
}) -> name('booking_ar');

Route::get('/tourist_guide_ar', function () {
    return view('admin-Ar.tourist_guide');
}) -> name('tourist_guide_ar');

Route::get('/transport_companies_ar', function () {
    return view('admin-Ar.transport_companies');
}) -> name('transport_company_ar');

Route::get('/groups_ar', function () {
    return view('admin-Ar.groups');
}) -> name('groupe_ar');


//user routes part English


Route::get('/', function () {
    return view('user.home');
})-> name('userhome');

Route::get('/about', function () {
    return view('user.about');
})-> name('about');

//user routes part Arabic


Route::get('/user_home_arabic', function () {
    return view('user-ar.home');
})-> name('userhome-ar');

Route::get('/about-ar', function () {
    return view('user-ar.about');
})-> name('about-ar');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

