<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TransportCompanyController;
use App\Http\Controllers\TouristGuideController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\PlaceController;

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

Route::get('/en/employees', [EmployeeProfileController::class, 'indexEn']) -> name('getEmployeesEn');
Route::post('/employee_en', [EmployeeProfileController::class, 'storeEn']) -> name('addEmployeeEn');
Route::post('/employee_en/edit', [EmployeeProfileController::class, 'updateEn']) -> name('editEmployeeEn');
Route::post('/employee_en/delete', [EmployeeProfileController::class, 'destroyEn']) -> name('deleteEmployeeEn');


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

// Route::get('/dist_en', function () {
//     return view('admin-En.districts');
// }) -> name('dist_en');

Route::get('/dist_en/{id}', [DistrictController::class, 'indexEn']) -> name('getDistrictsEn');
Route::post('/districts_en', [DistrictController::class, 'storeEn']) -> name('addDistrictEn');
Route::post('/districts_en/edit', [DistrictController::class, 'updateEn']) -> name('editDistrictEn');
Route::post('/districts_en/delete', [DistrictController::class, 'destroyEn']) -> name('deleteDistrictEn');


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



Route::get('/transportations_en', function () {
    return view('admin-En.transportations');
}) -> name('transportation_en');

Route::get('/transportations_en/{id}', [TransportationController::class, 'indexEn']) -> name('getTransportationsEn');
Route::post('/transportations_en', [TransportationController::class, 'storeEn']) -> name('addTransportationEn');
Route::post('/transportations_en/edit', [TransportationController::class, 'updateEn']) -> name('editTransportationEn');
Route::post('/transportations_en/delete', [TransportationController::class, 'destroyEn']) -> name('deleteTransportationEn');


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

Route::get('/ar/employees', [EmployeeProfileController::class, 'indexAr']) -> name('getEmployeesAr');
Route::post('/employee_ar', [EmployeeProfileController::class, 'storeAr']) -> name('addEmployeeAr');
Route::post('/employee_ar/edit', [EmployeeProfileController::class, 'updateAr']) -> name('editEmployeeAr');
Route::post('/employee_ar/delete', [EmployeeProfileController::class, 'destroyAr']) -> name('deleteEmployeeAr');

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

// Route::get('/place_ar', function () {
//     return view('admin-Ar.places');
// }) -> name('place_ar');

Route::get('/place_ar', [PlaceController::class, 'indexAr']) -> name('place_ar');
Route::post('/place_ar', [PlaceController::class, 'storeAr']) -> name('addPlaceAr');
Route::post('/place_ar/edit', [PlaceController::class, 'updateAr']) -> name('editPlaceAr');
Route::post('/place_ar/delete', [PlaceController::class, 'destroyAr']) -> name('deletePlaceAr');



Route::get('/offers_ar', function () {
    return view('admin-Ar.offers');
}) -> name('offer_ar');

Route::get('/services_ar', function () {
    return view('admin-Ar.services');
}) -> name('service_ar');

Route::get('/emp-places-ar', function () {
    return view('admin-Ar.employee_places');
}) -> name('emp-places-Ar');

Route::get('/emp-places-en', function () {
    return view('admin-En.employee_places');
}) -> name('emp-places-En');

// Route::get('/dist_ar', function () {
//     return view('admin-Ar.districts');
// }) -> name('dist_ar');

Route::get('/dist_ar/{id}', [DistrictController::class, 'indexAr']) -> name('getDistrictsAr');
Route::post('/districts_ar', [DistrictController::class, 'storeAr']) -> name('addDistrictAr');
Route::post('/districts_ar/edit', [DistrictController::class, 'updateAr']) -> name('editDistrictAr');
Route::post('/districts_ar/delete', [DistrictController::class, 'destroyAr']) -> name('deleteDistrictAr');



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

// Route::get('/transportations_ar', function () {
//     return view('admin-Ar.transportations');
// }) -> name('transportation_ar');

Route::get('/transportations_ar/{id}', [TransportationController::class, 'indexAr']) -> name('getTransportationsAr');
Route::post('/transportations_ar', [TransportationController::class, 'storeAr']) -> name('addTransportationAr');
Route::post('/transportations_ar/edit', [TransportationController::class, 'updateAr']) -> name('editTransportationAr');
Route::post('/transportations_ar/delete', [TransportationController::class, 'destroyAr']) -> name('deleteTransportationAr');

Route::get('/groups_ar', [GroupController::class, 'getGuidesAr']) -> name('groupe_ar');


Route::get('/ar/groups', [GroupController::class, 'indexAr']) -> name('getGroupsAr');
Route::post('/group_ar', [GroupController::class, 'storeAr']) -> name('addGroupAr');
Route::post('/group_ar/edit', [GroupController::class, 'updateAr']) -> name('editGroupAr');
Route::post('/group_ar/delete', [GroupController::class, 'destroyAr']) -> name('deleteGroupAr');


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

Route::get('/contact-en', function () {
    return view('user.contact');
})-> name('contact-en');


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

