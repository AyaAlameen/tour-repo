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
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserTransportCompanyController;
use App\Http\Controllers\UserGuideController;
use App\Http\Controllers\UserOfferController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\RatingController;

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
    Route::post('/sub_category_en/fields', [SubCategoryController::class, 'fieldsEn']) -> name('fieldsSubCategoryEn');
    
    //ar
    Route::get('/sub_category_ar/{id}', [SubCategoryController::class, 'indexAr']) -> name('getSubCategoriesAr');
    Route::post('/sub_category_ar', [SubCategoryController::class, 'storeAr']) -> name('addSubCategoryAr');
    Route::post('/sub_category_ar/edit', [SubCategoryController::class, 'updateAr']) -> name('editSubCategoryAr');
    Route::post('/sub_category_ar/delete', [SubCategoryController::class, 'destroyAr']) -> name('deleteSubCategoryAr');
    Route::post('/sub_category_ar/fields', [SubCategoryController::class, 'fieldsAr']) -> name('fieldsSubCategoryAr');

});

Route::middleware(['group'])->group(function(){

    //en
    Route::get('/groups_en', [GroupController::class, 'getGuidesEn']) -> name('groupe_en');
    Route::get('/en/groups', [GroupController::class, 'indexEn']) -> name('getGroupsEn');
    Route::post('/group_en', [GroupController::class, 'storeEn']) -> name('addGroupEn');
    Route::post('/group_en/edit', [GroupController::class, 'updateEn']) -> name('editGroupEn');
    Route::post('/group_en/delete', [GroupController::class, 'destroyEn']) -> name('deleteGroupEn');
    Route::post('/group_en/destinations/add', [GroupController::class, 'addGroupDestinationEn']) -> name('addGroupDestinationEn');
    Route::post('/group_en/destinations/delete', [GroupController::class, 'deleteGroupDestinationEn']) -> name('deleteDistEn');
    Route::post('/group_en/transportations/add', [GroupController::class, 'addGroupTransportationEn']) -> name('addGroupTransportationEn');
    Route::post('/group_en/transportations/delete', [GroupController::class, 'deleteGroupTransportationEn']) -> name('deleteTransEn');
    

    //ar
    Route::get('/groups_ar', [GroupController::class, 'getGuidesAr']) -> name('groupe_ar');    
    Route::get('/ar/groups', [GroupController::class, 'indexAr']) -> name('getGroupsAr');
    Route::post('/group_ar', [GroupController::class, 'storeAr']) -> name('addGroupAr');
    Route::post('/group_ar/edit', [GroupController::class, 'updateAr']) -> name('editGroupAr');
    Route::post('/group_ar/delete', [GroupController::class, 'destroyAr']) -> name('deleteGroupAr');
    Route::post('/group_ar/destinations/add', [GroupController::class, 'addGroupDestinationAr']) -> name('addGroupDestinationAr');
    Route::post('/group_ar/destinations/delete', [GroupController::class, 'deleteGroupDestinationAr']) -> name('deleteDistAr');
    Route::post('/group_ar/transportations/add', [GroupController::class, 'addGroupTransportationAr']) -> name('addGroupTransportationAr');
    Route::post('/group_ar/transportations/delete', [GroupController::class, 'deleteGroupTransportationAr']) -> name('deleteTransAr');
    
});

Route::middleware(['admin'])->group(function(){
    //en
    Route::get('/message_en', [MessageController::class, 'indexEn']) -> name('message_en');
    Route::post('/message_en/seen', [MessageController::class, 'seenEn']) -> name('messageSeenEn');
    Route::post('/message_en/publish', [MessageController::class, 'publishEn']) -> name('messagePublishEn');
    Route::post('/message_en/delete', [MessageController::class, 'destroyEn']) -> name('deleteMessageEn');

    Route::post('/message_en/filter', [MessageController::class, 'filterMessageEn']) -> name('filterMessageEn');

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

    Route::post('/message_ar/filter', [MessageController::class, 'filterMessageAr']) -> name('filterMessageAr');

    Route::get('/home_ar', [DashboardController::class, 'indexAr'])-> name('home_ar');
    Route::post('/home_ar/message/delete', [DashboardController::class, 'deleteMessageAr'])-> name('deleteMessageDashboardAr');
    Route::post('/home_ar/message/seen', [DashboardController::class, 'seenAr'])-> name('messageSeenDashboardAr');
    Route::post('/home_ar/message/publish', [DashboardController::class, 'publishAr'])-> name('messagePublishDashboardAr');


});

Route::middleware(['place'])->group(function(){

    //en
    // Route::get('/place_en', function () {
    //     return view('admin-En.places');
    // }) -> name('place_en');
    Route::get('/place_en', [PlaceController::class, 'indexEn']) -> name('place_en');
    Route::post('/place_en', [PlaceController::class, 'storeEn']) -> name('addPlaceEn');
    Route::post('/place_en/edit', [PlaceController::class, 'updateEn']) -> name('editPlaceEn');
    Route::post('/place_en/delete', [PlaceController::class, 'destroyEn']) -> name('deletePlaceEn');
    //ar
    
    // Route::get('/place_ar', function () {
    //     return view('admin-Ar.places');
    // }) -> name('place_ar');
    Route::get('/place_ar', [PlaceController::class, 'indexAr']) -> name('place_ar');
    Route::post('/place_ar', [PlaceController::class, 'storeAr']) -> name('addPlaceAr');
    Route::post('/place_ar/edit', [PlaceController::class, 'updateAr']) -> name('editPlaceAr');
    Route::post('/place_ar/delete', [PlaceController::class, 'destroyAr']) -> name('deletePlaceAr');


    Route::get('/place_pic_ar/{id}', [PlaceController::class, 'placeImagesAr']) -> name('place_pic_ar');
    Route::post('/place_pic_ar/add', [PlaceController::class, 'addPlaceImagesAr']) -> name('addPlaceImageAr');
    Route::post('/place_pic_ar/delete', [PlaceController::class, 'deletePlaceImageAr']) -> name('deletePlaceImageAr');



    Route::get('/place_pic_en/{id}', [PlaceController::class, 'placeImagesEn']) -> name('place_pic_en');
    Route::post('/place_pic_en/add', [PlaceController::class, 'addPlaceImagesEn']) -> name('addPlaceImageEn');
    Route::post('/place_pic_en/delete', [PlaceController::class, 'deletePlaceImageEn']) -> name('deletePlaceImageEn');

});


Route::middleware(['offer'])->group(function(){
    
    //en
    // Route::get('/offers_en', function () {
    //     return view('admin-En.offers');
    // }) -> name('offer_en');

    Route::get('/offers_en', [OfferController::class, 'indexEn']) -> name('offer_en');
    Route::post('/offers_en', [OfferController::class, 'storeEn']) -> name('addOfferEn');
    Route::post('/offers_en/edit', [OfferController::class, 'updateEn']) -> name('editOfferEn');
    Route::post('/offers_en/delete', [OfferController::class, 'destroyEn']) -> name('deleteOfferEn');

    //ar
    // Route::get('/offers_ar', function () {
    //     return view('admin-Ar.offers');
    // }) -> name('offer_ar');

    Route::get('/offers_ar', [OfferController::class, 'indexAr']) -> name('offer_ar');
    Route::post('/offers_ar', [OfferController::class, 'storeAr']) -> name('addOfferAr');
    Route::post('/offers_ar/edit', [OfferController::class, 'updateAr']) -> name('editOfferAr');
    Route::post('/offers_ar/delete', [OfferController::class, 'destroyAr']) -> name('deleteOfferAr');
});

Route::middleware(['service'])->group(function(){

    //en
    Route::get('/services_en', [ServiceController::class, 'indexEn']) -> name('service_en');
    Route::post('/services_en', [ServiceController::class, 'storeEn']) -> name('addServiceEn');
    Route::post('/services_en/edit', [ServiceController::class, 'updateEn']) -> name('editServiceEn');
    Route::post('/services_en/delete', [ServiceController::class, 'destroyEn']) -> name('deleteServiceEn');
    
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
    // Route::get('/events_en', function () {
    //     return view('admin-En.events');
    // }) -> name('event_en');

    Route::get('/events_en', [EventController::class, 'indexEn']) -> name('event_en');
    Route::post('/events_en', [EventController::class, 'storeEn']) -> name('addEventEn');
    Route::post('/events_en/edit', [EventController::class, 'updateEn']) -> name('editEventEn');
    Route::post('/events_en/delete', [EventController::class, 'destroyEn']) -> name('deleteEventEn');

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
    
    Route::get('/groups_booking_en', function () {
        return view('admin-En.groups_booking');
    }) -> name('groups_booking_en');

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
    
    Route::get('/groups_booking_ar', function () {
        return view('admin-Ar.groups_booking');
    }) -> name('groups_booking_ar');

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
    

    
    



//user routes part English


// Route::get('/', function () {
//     return view('user.home');
// })-> name('home');

Route::post('/profile_ar/edit', [UserController::class, 'editProfileAr'])-> name('editProfileAr');
Route::post('/profile_en/edit', [UserController::class, 'editProfileEn'])-> name('editProfileEn');



Route::get('/home-en', [UserHomeController::class, 'indexEn'])-> name('home-en');


Route::get('/about', [AboutController::class, 'indexEn'])-> name('about');

Route::get('/contact', function () {
    return view('user.contact');
})-> name('contact');

Route::get('/event-en', function () {
    return view('user.event');
})-> name('event-en');

Route::get('/event_details-en', function () {
    return view('user.event_details');
})-> name('event_details-en');

Route::get('/offer-en', function () {
    return view('user.offer');
})-> name('offer-en');

Route::get('/offer_details-en', function () {
    return view('user.offer_details');
})-> name('offer_details-en');

Route::get('/contact-en', function () {
    return view('user.contact');
})-> name('contact-en');

// Route::get('/user_city_en', function () {
//     return view('user.city');
// })-> name('user-city-en');

Route::get('/user_city_en/{id}', [App\Http\Controllers\CityController::class, 'cityDetailsEn'])-> name('user-city-en');


// Route::get('/place_details_en/{id}', function () {
//     return view('user.place_details');
// })-> name('place_details_en');

Route::get('/place_details_en/{id}', [App\Http\Controllers\PlaceController::class, 'placeDetailsEn'])-> name('place_details_en');

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

Route::get('/event-ar', function () {
    return view('user-ar.event');
})-> name('event-ar');

Route::get('/event_details-ar', function () {
    return view('user-ar.event_details');
})-> name('event_details-ar');


Route::get('/offer-ar', [UserOfferController::class, 'getOffersAr'])-> name('offer-ar');

Route::get('/offer_details-ar', function () {
    return view('user-ar.offer_details');
})-> name('offer_details-ar');

// Route::get('/user_home_arabic', function () {
//     return view('user-ar.home');
// })-> name('userhome-ar');
Route::get('/user_home_arabic', [UserHomeController::class, 'indexAr'])-> name('userhome-ar');
Route::post('/contact', [MessageController::class, 'storeAr'])-> name('submitMessageAr');

Route::get('/about-ar', [AboutController::class, 'indexAr'])-> name('about-ar');

Route::get('/transport-ar', [UserTransportCompanyController::class, 'getTransportionCompanyAr'])-> name('transport-ar'); 


Route::get('/travelguides-ar', [UserGuideController::class, 'getGuidesAr'])-> name('travelguides-ar');

// Route::get('/travelguidesformore-ar', function () {
//     return view('user-ar.travelguidesformore');
// })-> name('travelguidesformore-ar');

Route::get('/travelguidesformore-ar/{id}', [UserGuideController::class, 'getGuideDetailsAr'])-> name('travelguidesformore-ar');


Route::get('/trip-ar', [UserGroupController::class, 'getGroupsAr'])-> name('trip-ar');

// Route::get('/tripmore-ar', function () {
//     return view('user-ar.tripmore');
// })-> name('tripmore-ar');
Route::get('/tripmore-ar/{id}', [UserGroupController::class, 'getGroupDetailsAr'])-> name('tripmore-ar');


Route::get('/user_city_ar/{id}', [App\Http\Controllers\CityController::class, 'cityDetailsAr'])-> name('user-city-ar');
Route::post('/ar/city/places', [CityController::class, 'getSubCategoryPlaceAr']) -> name('getSubCategoryPlaceAr');
Route::post('/en/city/places', [CityController::class, 'getSubCategoryPlaceEn']) -> name('getSubCategoryPlaceEn');

Route::post('/ar/place/favorite', [FavoriteController::class, 'favoritePlaceAr']) -> name('favoritePlaceAr');
Route::post('/ar/place/stars', [RatingController::class, 'startsPlaceAr']) -> name('startsPlaceAr');
Route::post('/ar/place/reviews', [RatingController::class, 'reviewsPlaceAr']) -> name('reviewsPlaceAr');
Route::post('/en/place/reviews', [RatingController::class, 'reviewsPlaceEn']) -> name('reviewsPlaceEn');


Route::post('/ar/service/filter', [ServiceController::class, 'filterServicesAr']) -> name('filterServicesAr');
Route::post('/en/service/filter', [ServiceController::class, 'filterServicesEn']) -> name('filterServicesEn');

// Route::get('/place_details_ar', function () {
//     return view('user-ar.place_details');
// })-> name('place_details_ar');

Route::get('/place_details_ar/{id}', [App\Http\Controllers\PlaceController::class, 'placeDetailsAr'])-> name('place_details_ar');


Auth::routes();

 Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

