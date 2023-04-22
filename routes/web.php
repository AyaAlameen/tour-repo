<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TransportCompanyController;
use App\Http\Controllers\TouristGuideController;

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

Route::get('/en/categories', [CategoryController::class, 'indexEn']) -> name('getCategoriesEn');
Route::post('/cat_en', [CategoryController::class, 'storeEn']) -> name('addCategoryEn');
Route::post('/cat_en/edit', [CategoryController::class, 'updateEn']) -> name('editCategoryEn');
Route::post('/cat_en/delete', [CategoryController::class, 'destroyEn']) -> name('deleteCategoryEn');

Route::get('/cities_en', function () {
    return view('admin-En.cities');
}) -> name('city_en');
Route::get('/en/cities', [CityController::class, 'indexEn']) -> name('getCitiesEn');
Route::post('/city_en', [CityController::class, 'storeEn']) -> name('addCityEn');
Route::post('/city_en/edit', [CityController::class, 'updateEn']) -> name('editCityEn');
Route::post('/city_en/delete', [CityController::class, 'destroyEn']) -> name('deleteCityEn');

Route::get('/sub_category_en/{id}', [SubCategoryController::class, 'indexEn']) -> name('getSubCategoriesEn');
Route::post('/sub_category_en', [SubCategoryController::class, 'storeEn']) -> name('addSubCategoryEn');
Route::post('/sub_category_en/edit', [SubCategoryController::class, 'updateEn']) -> name('editSubCategoryEn');
Route::post('/sub_category_en/delete', [SubCategoryController::class, 'destroyEn']) -> name('deleteSubCategoryEn');

Route::get('/message_en', function () {
    return view('admin-En.messages');
}) -> name('message_en');

Route::get('/place_en', function () {
    return view('admin-En.places');
}) -> name('place_en');



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

Route::get('/places_booking_en', function () {
    return view('admin-En.places_bookings');
}) -> name('places_booking_en');

Route::get('/offers_booking_en', function () {
    return view('admin-En.offers_bookings');
}) -> name('offers_booking_en');

Route::get('/services_booking_en', function () {
    return view('admin-En.services_bookings');
}) -> name('services_booking_en');

Route::get('/events_booking_en', function () {
    return view('admin-En.events_bookings');
}) -> name('events_booking_en');

Route::get('/tourist_guide_en', function () {
    return view('admin-En.tourist_guide');
}) -> name('tourist_guide_en');

Route::get('/en/tourist_guide', [TouristGuideController::class, 'indexEn']) -> name('getTouristGuideEn');
Route::post('/tourist_guide_en', [TouristGuideController::class, 'storeEn']) -> name('addTouristGuideEn');
Route::post('/tourist_guide_en/edit', [TouristGuideController::class, 'updateEn']) -> name('editTouristGuideEn');
Route::post('/tourist_guide_en/delete', [TouristGuideController::class, 'destroyEn']) -> name('deleteTouristGuideEn');


Route::get('/transport_companies_en', function () {
    return view('admin-En.transport_companies');
}) -> name('transport_company_en');

Route::get('/en/transport_companies', [TransportCompanyController::class, 'indexEn']) -> name('getTransportCompaniesEn');
Route::post('/transport_companies_en', [TransportCompanyController::class, 'storeEn']) -> name('addTransportCompanyEn');
Route::post('/transport_companies_en/edit', [TransportCompanyController::class, 'updateEn']) -> name('editTransportCompanyEn');
Route::post('/transport_companies_en/delete', [TransportCompanyController::class, 'destroyEn']) -> name('deleteTransportCompanyEn');


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
Route::get('/ar/categories', [CategoryController::class, 'indexAr']) -> name('getCategoriesAr');
Route::post('/cat_ar', [CategoryController::class, 'storeAr']) -> name('addCategoryAr');
Route::post('/cat_ar/edit', [CategoryController::class, 'updateAr']) -> name('editCategoryAr');
Route::post('/cat_ar/delete', [CategoryController::class, 'destroyAr']) -> name('deleteCategoryAr');

Route::get('/message_ar', function () {
    return view('admin-Ar.messages');
}) -> name('message_ar');

Route::get('/sub_category_ar/{id}', [SubCategoryController::class, 'indexAr']) -> name('getSubCategoriesAr');
Route::post('/sub_category_ar', [SubCategoryController::class, 'storeAr']) -> name('addSubCategoryAr');
Route::post('/sub_category_ar/edit', [SubCategoryController::class, 'updateAr']) -> name('editSubCategoryAr');
Route::post('/sub_category_ar/delete', [SubCategoryController::class, 'destroyAr']) -> name('deleteSubCategoryAr');


Route::get('/cities_ar', function () {
    return view('admin-Ar.cities');
}) -> name('city_ar');
Route::get('/ar/cities', [CityController::class, 'indexAr']) -> name('getCitiesAr');
Route::post('/city_ar', [CityController::class, 'storeAr']) -> name('addCityAr');
Route::post('/city_ar/edit', [CityController::class, 'updateAr']) -> name('editCityAr');
Route::post('/city_ar/delete', [CityController::class, 'destroyAr']) -> name('deleteCityAr');

Route::get('/place_ar', function () {
    return view('admin-Ar.places');
}) -> name('place_ar');


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

Route::get('/places_booking_ar', function () {
    return view('admin-Ar.places_bookings');
}) -> name('places_booking_ar');

Route::get('/offers_booking_ar', function () {
    return view('admin-Ar.offers_bookings');
}) -> name('offers_booking_ar');

Route::get('/services_booking_ar', function () {
    return view('admin-Ar.services_bookings');
}) -> name('services_booking_ar');

Route::get('/events_booking_ar', function () {
    return view('admin-Ar.events_bookings');
}) -> name('events_booking_ar');

Route::get('/tourist_guide_ar', function () {
    return view('admin-Ar.tourist_guide');
}) -> name('tourist_guide_ar');

Route::get('/ar/tourist_guide', [TouristGuideController::class, 'indexAr']) -> name('getTouristGuideAr');
Route::post('/tourist_guide_ar', [TouristGuideController::class, 'storeAr']) -> name('addTouristGuideAr');
Route::post('/tourist_guide_ar/edit', [TouristGuideController::class, 'updateAr']) -> name('editTouristGuideAr');
Route::post('/tourist_guide_ar/delete', [TouristGuideController::class, 'destroyAr']) -> name('deleteTouristGuideAr');



Route::get('/transport_companies_ar', function () {
    return view('admin-Ar.transport_companies');
}) -> name('transport_company_ar');

Route::get('/ar/transport_companies', [TransportCompanyController::class, 'indexAr']) -> name('getTransportCompaniesAr');
Route::post('/transport_companies_ar', [TransportCompanyController::class, 'storeAr']) -> name('addTransportCompanyAr');
Route::post('/transport_companies_ar/edit', [TransportCompanyController::class, 'updateAr']) -> name('editTransportCompanyAr');
Route::post('/transport_companies_ar/delete', [TransportCompanyController::class, 'destroyAr']) -> name('deleteTransportCompanyAr');


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
Route::get('/contact', function () {
    return view('user.contact');
})-> name('contact');



//user routes part Arabic

Route::get('/contact-ar', function () {
    return view('user-ar.contact');
})-> name('contact-ar');

Route::get('/user_home_arabic', function () {
    return view('user-ar.home');
})-> name('userhome-ar');

Route::get('/about-ar', function () {
    return view('user-ar.about');
})-> name('about-ar');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

