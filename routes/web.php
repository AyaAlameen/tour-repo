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
use App\Http\Controllers\EventController;
use App\Http\Controllers\PlaceEmployeeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;

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


Route::middleware(['category'])->group(function(){
    //en
    Route::get('/cat_en', function () {
        return view('admin-En.categories');
    }) -> name('category_en');
    
    Route::get('/en/categories', [CategoryController::class, 'indexEn']) -> name('getCategoriesEn');
    Route::post('/cat_en', [CategoryController::class, 'storeEn']) -> name('addCategoryEn');
    Route::post('/cat_en/edit', [CategoryController::class, 'updateEn']) -> name('editCategoryEn');
    Route::post('/cat_en/delete', [CategoryController::class, 'destroyEn']) -> name('deleteCategoryEn');
    
    //ar
    Route::get('/cat_ar', function () {
        return view('admin-Ar.categories');
    }) -> name('category_ar');
    Route::get('/ar/categories', [CategoryController::class, 'indexAr']) -> name('getCategoriesAr');
    Route::post('/cat_ar', [CategoryController::class, 'storeAr']) -> name('addCategoryAr');
    Route::post('/cat_ar/edit', [CategoryController::class, 'updateAr']) -> name('editCategoryAr');
    Route::post('/cat_ar/delete', [CategoryController::class, 'destroyAr']) -> name('deleteCategoryAr');
    
});

Route::middleware(['employee'])->group(function(){
    
    //en
    Route::get('/employee_en', function () {
        return view('admin-En.employee');
    }) -> name('employee_en');
    
    Route::get('/en/employees', [EmployeeProfileController::class, 'indexEn']) -> name('getEmployeesEn');
    Route::post('/employee_en', [EmployeeProfileController::class, 'storeEn']) -> name('addEmployeeEn');
    Route::post('/employee_en/edit', [EmployeeProfileController::class, 'updateEn']) -> name('editEmployeeEn');
    Route::post('/employee_en/delete', [EmployeeProfileController::class, 'destroyEn']) -> name('deleteEmployeeEn');
    Route::post('/employee_en/permissions', [EmployeeProfileController::class, 'permissionsEn']) -> name('employeePermissionsEn');
    
    //ar
        
    Route::get('/employee_ar', function () {
        return view('admin-Ar.employee');
    }) -> name('employee_ar');
    
    Route::get('/ar/employees', [EmployeeProfileController::class, 'indexAr']) -> name('getEmployeesAr');
    Route::post('/employee_ar', [EmployeeProfileController::class, 'storeAr']) -> name('addEmployeeAr');
    Route::post('/employee_ar/edit', [EmployeeProfileController::class, 'updateAr']) -> name('editEmployeeAr');
    Route::post('/employee_ar/delete', [EmployeeProfileController::class, 'destroyAr']) -> name('deleteEmployeeAr');
    Route::post('/employee_ar/permissions', [EmployeeProfileController::class, 'permissionsAr']) -> name('employeePermissionsAr');

});

Route::middleware(['city'])->group(function(){

    //en
    Route::get('/cities_en', function () {
        return view('admin-En.cities');
    }) -> name('city_en');
    Route::get('/en/cities', [CityController::class, 'indexEn']) -> name('getCitiesEn');
    Route::post('/city_en', [CityController::class, 'storeEn']) -> name('addCityEn');
    Route::post('/city_en/edit', [CityController::class, 'updateEn']) -> name('editCityEn');
    Route::post('/city_en/delete', [CityController::class, 'destroyEn']) -> name('deleteCityEn');
    
    //ar
    Route::get('/cities_ar', function () {
        return view('admin-Ar.cities');
    }) -> name('city_ar');
    Route::get('/ar/cities', [CityController::class, 'indexAr']) -> name('getCitiesAr');
    Route::post('/city_ar', [CityController::class, 'storeAr']) -> name('addCityAr');
    Route::post('/city_ar/edit', [CityController::class, 'updateAr']) -> name('editCityAr');
    Route::post('/city_ar/delete', [CityController::class, 'destroyAr']) -> name('deleteCityAr');
    

});

Route::middleware(['sub_category'])->group(function(){

    //en
    Route::get('/sub_category_en/{id}', [SubCategoryController::class, 'indexEn']) -> name('getSubCategoriesEn');
    Route::post('/sub_category_en', [SubCategoryController::class, 'storeEn']) -> name('addSubCategoryEn');
    Route::post('/sub_category_en/edit', [SubCategoryController::class, 'updateEn']) -> name('editSubCategoryEn');
    Route::post('/sub_category_en/delete', [SubCategoryController::class, 'destroyEn']) -> name('deleteSubCategoryEn');
    
    //ar
    Route::get('/sub_category_ar/{id}', [SubCategoryController::class, 'indexAr']) -> name('getSubCategoriesAr');
    Route::post('/sub_category_ar', [SubCategoryController::class, 'storeAr']) -> name('addSubCategoryAr');
    Route::post('/sub_category_ar/edit', [SubCategoryController::class, 'updateAr']) -> name('editSubCategoryAr');
    Route::post('/sub_category_ar/delete', [SubCategoryController::class, 'destroyAr']) -> name('deleteSubCategoryAr');

});

Route::middleware(['admin'])->group(function(){
    //en
    Route::get('/message_en', [MessageController::class, 'indexEn']) -> name('message_en');
    Route::post('/message_en/seen', [MessageController::class, 'seenEn']) -> name('messageSeenEn');
    Route::post('/message_en/publish', [MessageController::class, 'publishEn']) -> name('messagePublishEn');
    Route::post('/message_en/delete', [MessageController::class, 'destroyEn']) -> name('deleteMessageEn');

    // Route::get('/home_en', function () {
    //     return view('admin-En.dashboared');
    // })-> name('home_en');
    Route::get('/home_en', [DashboardController::class, 'indexEn'])-> name('home_en');
    Route::post('/home_en/message/delete', [DashboardController::class, 'deleteMessageEn'])-> name('deleteMessageDashboardEn');
    Route::post('/home_en/message/seen', [DashboardController::class, 'seenEn'])-> name('messageSeenDashboardEn');
    Route::post('/home_en/message/publish', [DashboardController::class, 'publishEn'])-> name('messagePublishDashboardEn');
    
    
    //ar
    Route::get('/message_ar', [MessageController::class, 'indexAr']) -> name('message_ar');
    Route::post('/message_ar/seen', [MessageController::class, 'seenAr']) -> name('messageSeenAr');
    Route::post('/message_ar/publish', [MessageController::class, 'publishAr']) -> name('messagePublishAr');
    Route::post('/message_ar/delete', [MessageController::class, 'destroyAr']) -> name('deleteMessageAr');

    Route::get('/home_ar', [DashboardController::class, 'indexAr'])-> name('home_ar');
    Route::post('/home_ar/message/delete', [DashboardController::class, 'deleteMessageAr'])-> name('deleteMessageDashboardAr');
    Route::post('/home_ar/message/seen', [DashboardController::class, 'seenAr'])-> name('messageSeenDashboardAr');
    Route::post('/home_ar/message/publish', [DashboardController::class, 'publishAr'])-> name('messagePublishDashboardAr');


});

Route::middleware(['place'])->group(function(){

    //en
    Route::get('/place_en', function () {
        return view('admin-En.places');
    }) -> name('place_en');

    //ar
    
    // Route::get('/place_ar', function () {
    //     return view('admin-Ar.places');
    // }) -> name('place_ar');
    Route::get('/place_ar', [PlaceController::class, 'indexAr']) -> name('place_ar');
    Route::post('/place_ar', [PlaceController::class, 'storeAr']) -> name('addPlaceAr');
    Route::post('/place_ar/edit', [PlaceController::class, 'updateAr']) -> name('editPlaceAr');
    Route::post('/place_ar/delete', [PlaceController::class, 'destroyAr']) -> name('deletePlaceAr');
});

Route::middleware(['offer'])->group(function(){
    
    //en
    Route::get('/offers_en', function () {
        return view('admin-En.offers');
    }) -> name('offer_en');

    //ar
    Route::get('/offers_ar', function () {
        return view('admin-Ar.offers');
    }) -> name('offer_ar');
});

Route::middleware(['service'])->group(function(){

    //en
    Route::get('/services_en', function () {
        return view('admin-En.services');
    }) -> name('service_en');
    
    //ar
        // Route::get('/services_ar', function () {
        //     return view('admin-Ar.services');
        // }) -> name('service_ar');
    Route::get('/services_ar', [ServiceController::class, 'indexAr']) -> name('service_ar');
    Route::post('/services_ar', [ServiceController::class, 'storeAr']) -> name('addServiceAr');
    Route::post('/services_ar/edit', [ServiceController::class, 'updateAr']) -> name('editServiceAr');
    Route::post('/services_ar/delete', [ServiceController::class, 'destroyAr']) -> name('deleteServiceAr');
});
Route::middleware(['district'])->group(function(){

    //en
    Route::get('/dist_en/{id}', [DistrictController::class, 'indexEn']) -> name('getDistrictsEn');
    Route::post('/districts_en', [DistrictController::class, 'storeEn']) -> name('addDistrictEn');
    Route::post('/districts_en/edit', [DistrictController::class, 'updateEn']) -> name('editDistrictEn');
    Route::post('/districts_en/delete', [DistrictController::class, 'destroyEn']) -> name('deleteDistrictEn');
    
    //ar
    Route::get('/dist_ar/{id}', [DistrictController::class, 'indexAr']) -> name('getDistrictsAr');
    Route::post('/districts_ar', [DistrictController::class, 'storeAr']) -> name('addDistrictAr');
    Route::post('/districts_ar/edit', [DistrictController::class, 'updateAr']) -> name('editDistrictAr');
    Route::post('/districts_ar/delete', [DistrictController::class, 'destroyAr']) -> name('deleteDistrictAr');
});

Route::middleware(['event'])->group(function(){

    //en
    Route::get('/events_en', function () {
        return view('admin-En.events');
    }) -> name('event_en');

    //ar
        // Route::get('/events_ar', function () {
        //     return view('admin-Ar.events');
        // }) -> name('event_ar');
    Route::get('/events_ar', [EventController::class, 'indexAr']) -> name('event_ar');
    Route::post('/events_ar', [EventController::class, 'storeAr']) -> name('addEventAr');
    Route::post('/events_ar/edit', [EventController::class, 'updateAr']) -> name('editEventAr');
    Route::post('/events_ar/delete', [EventController::class, 'destroyAr']) -> name('deleteEventAr');
    
});

Route::middleware(['tourist_guide'])->group(function(){

    //en
    Route::get('/tourist_guide_en', function () {
        return view('admin-En.tourist_guide');
    }) -> name('tourist_guide_en');
    
    Route::get('/en/tourist_guide', [TouristGuideController::class, 'indexEn']) -> name('getTouristGuideEn');
    Route::post('/tourist_guide_en', [TouristGuideController::class, 'storeEn']) -> name('addTouristGuideEn');
    Route::post('/tourist_guide_en/edit', [TouristGuideController::class, 'updateEn']) -> name('editTouristGuideEn');
    Route::post('/tourist_guide_en/delete', [TouristGuideController::class, 'destroyEn']) -> name('deleteTouristGuideEn');
    
});
    //admin routes part English

    


    
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
    

    
    Route::get('/transport_companies_en', function () {
        return view('admin-En.transport_companies');
    }) -> name('transport_company_en');
    
    Route::get('/en/transport_companies', [TransportCompanyController::class, 'indexEn']) -> name('getTransportCompaniesEn');
    Route::post('/transport_companies_en', [TransportCompanyController::class, 'storeEn']) -> name('addTransportCompanyEn');
    Route::post('/transport_companies_en/edit', [TransportCompanyController::class, 'updateEn']) -> name('editTransportCompanyEn');
    Route::post('/transport_companies_en/delete', [TransportCompanyController::class, 'destroyEn']) -> name('deleteTransportCompanyEn');
    
    
    
    // Route::get('/transportations_en', function () {
    //     return view('admin-En.transportations');
    // }) -> name('transportation_en');
    
    Route::get('/transportations_en/{id}', [TransportationController::class, 'indexEn']) -> name('getTransportationsEn');
    Route::post('/transportations_en', [TransportationController::class, 'storeEn']) -> name('addTransportationEn');
    Route::post('/transportations_en/edit', [TransportationController::class, 'updateEn']) -> name('editTransportationEn');
    Route::post('/transportations_en/delete', [TransportationController::class, 'destroyEn']) -> name('deleteTransportationEn');
    
    
    Route::get('/groups_en', function () {
        return view('admin-En.groups');
    }) -> name('groupe_en');
    
    
    //admin routes part Arabic
    
    
    // Route::get('/home_ar', function () {
    //     return view('admin-Ar.dashboared');
    // })-> name('home_ar');
    


    

    

    
    
    Route::get('/emp-places-ar', [PlaceEmployeeController::class, 'placesAr']) -> name('emp-places-Ar');
    
    Route::get('/ar/places-employees', [PlaceEmployeeController::class, 'indexAr']) -> name('getPlacesEmployeesAr');
    Route::post('/emp-places-ar', [PlaceEmployeeController::class, 'storeAr']) -> name('addPlaceEmployeeAr');
    Route::post('/emp-places-ar/edit', [PlaceEmployeeController::class, 'updateAr']) -> name('editPlaceEmployeeAr');
    Route::post('/emp-places-ar/delete', [PlaceEmployeeController::class, 'destroyAr']) -> name('deletePlaceEmployeeAr');
    
    
    Route::get('/emp-places-en', function () {
        return view('admin-En.employee_places');
    }) -> name('emp-places-En');
    
    
    Route::get('/emp-places-en', [PlaceEmployeeController::class, 'placesEn']) -> name('emp-places-En');
    
    Route::get('/en/places-employees', [PlaceEmployeeController::class, 'indexEn']) -> name('getPlacesEmployeesEn');
    Route::post('/emp-places-en', [PlaceEmployeeController::class, 'storeEn']) -> name('addPlaceEmployeeEn');
    Route::post('/emp-places-en/edit', [PlaceEmployeeController::class, 'updateEn']) -> name('editPlaceEmployeeEn');
    Route::post('/emp-places-en/delete', [PlaceEmployeeController::class, 'destroyEn']) -> name('deletePlaceEmployeeEn');
    
 
    
    

    
    
    
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
    Route::post('/group_ar/destinations/add', [GroupController::class, 'addGroupDestinationAr']) -> name('addGroupDestinationAr');
    
    



//user routes part English


// Route::get('/', function () {
//     return view('user.home');
// })-> name('home');

Route::get('/home-en', [UserHomeController::class, 'indexEn'])-> name('home-en');


Route::get('/about', function () {
    return view('user.about');
})-> name('about');
Route::get('/contact', function () {
    return view('user.contact');
})-> name('contact');

Route::get('/contact-en', function () {
    return view('user.contact');
})-> name('contact-en');

Route::get('/transport', function () {
    return view('user.transport');
})-> name('transport');

Route::get('/travelguides', function () {
    return view('user.travelguides');
})-> name('travelguides');

Route::get('/travelguidesformore', function () {
    return view('user.travelguidesformore');
})-> name('travelguidesformore');
Route::get('/trips', function () {
    return view('user.trips');
})-> name('trips');
Route::get('/tripmore', function () {
    return view('user.tripmore');
})-> name('tripmore');
//user routes part Arabic

Route::get('/contact-ar', function () {
    return view('user-ar.contact');
})-> name('contact-ar');

// Route::get('/user_home_arabic', function () {
//     return view('user-ar.home');
// })-> name('userhome-ar');
Route::get('/user_home_arabic', [UserHomeController::class, 'indexAr'])-> name('userhome-ar');
Route::post('/contact', [MessageController::class, 'storeAr'])-> name('submitMessageAr');

Route::get('/about-ar', function () {
    return view('user-ar.about');
})-> name('about-ar');

Route::get('/transport-ar', function () {
    return view('user-ar.transport');
})-> name('transport-ar'); 

Route::get('/travelguides-ar', function () {
    return view('user-ar.travelguides');
})-> name('travelguides-ar');

Route::get('/travelguidesformore-ar', function () {
    return view('user-ar.travelguidesformore');
})-> name('travelguidesformore-ar');


Route::get('/trip-ar', function () {
    return view('user-ar.trips');
})-> name('trip-ar');
Route::get('/tripmore-ar', function () {
    return view('user-ar.tripmore');
})-> name('tripmore-ar');

Route::get('/user_city_ar', function () {
    return view('user-ar.city');
})-> name('user-city-ar');

Route::get('/place_details_ar', function () {
    return view('user-ar.place_details');
})-> name('place_details_ar');

Auth::routes();

 Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

