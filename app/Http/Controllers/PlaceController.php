<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\City;
use App\Models\District;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();

        return view('admin-Ar.places', ['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);


    }
    
    public function indexEn()
    {
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();

        return view('admin-En.places', ['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);


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
        
        // dd('hb');
        $data=$request->input();
        //validation:
        // dd($request);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'sub_category_id' => 'required',
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'unique:places'],
            'cost' => 'numeric|min:1',
            'profit_ratio_1' => 'required|numeric|min:1',
            'profit_ratio_2' => 'required|numeric|min:1',
            'geolocation' => 'required',

        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'city_id.required' => 'حقل المدينة مطلوب',
            'district_id.required' => 'حقل الناحية مطلوب',
            'sub_category_id.required' => 'حقل الصنف الفرعي مطلوب',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب أن يتكون من أرقام فقط',
            'phone.digits' => 'حقل الهاتف يجب أن يتكون من 10 خانات',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
            'profit_ratio_1.required' => 'حقل نسبة الأرباح الخارجية مطلوب',
            'profit_ratio_1.numeric' => 'حقل نسبة الأرباح الخارجية يجب أن يكون رقم',
            'profit_ratio_1.min' => 'حقل نسبة الأرباح الخارجية يجب أن يكون أكبر من الصفر',
            'profit_ratio_2.required' => 'حقل نسبة الأرباح الداخلية مطلوب',
            'profit_ratio_2.numeric' => 'حقل نسبة الأرباح الداخلية يجب أن يكون رقم',
            'profit_ratio_2.min' => 'حقل نسبة الأرباح الداخلية يجب أن يكون أكبر من الصفر',
            'geolocation.required' => 'حقل الموقع مطلوب',

        ]);
        

        $place = new Place;

        $place->sub_category_id = $request->input('sub_category_id');
        $place->district_id = $request->input('district_id');
        $place->geolocation = $request->input('geolocation');
        $place->email = $request->input('email');
        $place->phone = $request->input('phone');
        $place->cost = $request->input('cost');
        $place->profit_ratio_1 = $request->input('profit_ratio_1');
        $place->profit_ratio_2 = $request->input('profit_ratio_2');
        $files = $request->files->all();
        $place->save();
        if ($files) {
            foreach ($files as $name => $file) {
                // dd($name, $file);
                $upload_image_name = time().'_'.$file->getClientOriginalName();
                $file->move('uploads/placeImage', $upload_image_name);
                $place->images()->create( ['image' => "uploads/placeImage/$upload_image_name"]);
            }
        }

        
// dd($place);
        $place->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $place->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();
        
        return view("admin-Ar.sections.place-section")->with(['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);


    }

    public function storeEn(Request $request)
    {
        // dd('hb');
        $data=$request->input();
        //validation:
        // dd($request);
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'sub_category_id' => 'required',
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'unique:places'],
            'cost' => 'required|numeric|min:1',
            'profit_ratio_1' => 'required|numeric|min:1',
            'profit_ratio_2' => 'required|numeric|min:1',
            'geolocation' => 'required',

        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'city_id.required' => 'City feild is required',
            'district_id.required' => 'District feild is required',
            'sub_category_id.required' => 'Subcategory feild is required',
            'phone.required' => 'Phone feild is required',
            'phone.numeric' => 'Phone field must consist of numbers only',
            'phone.digits' => 'Phone field must contain 10 characters',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than 0',
            'profit_ratio_1.required' => 'External Profit Ratio feild is required',
            'profit_ratio_1.numeric' => 'External Profit Ratio field must consist of numbers only',
            'profit_ratio_1.min' => 'External Profit Ratio field must be greater than 0',
            'profit_ratio_2.required' => 'Internal Profit Ratio feild is required',
            'profit_ratio_2.numeric' => 'Internal Profit Ratio field must consist of numbers only',
            'profit_ratio_2.min' => 'Internal Profit Ratio field must be greater than 0',
            'geolocation.required' => 'Geolocation feild is required',

        ]);
        

        $place = new Place;

        $place->sub_category_id = $request->input('sub_category_id');
        $place->district_id = $request->input('district_id');
        $place->geolocation = $request->input('geolocation');
        $place->email = $request->input('email');
        $place->phone = $request->input('phone');
        $place->cost = $request->input('cost');
        $place->profit_ratio_1 = $request->input('profit_ratio_1');
        $place->profit_ratio_2 = $request->input('profit_ratio_2');
        $files = $request->files->all();
        $place->save();
        if ($files) {
            foreach ($files as $name => $file) {
                // dd($name, $file);
                $upload_image_name = time().'_'.$file->getClientOriginalName();
                $file->move('uploads/placeImage', $upload_image_name);
                $place->images()->create( ['image' => "uploads/placeImage/$upload_image_name"]);
            }
        }

        
// dd($place);
        $place->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'locale' => 'en']);
        $place->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'locale' => 'ar']);
        
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();
        
        return view("admin-En.sections.place-section")->with(['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {
        // dd($request);
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'sub_category_id' => 'required',
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'unique:places,email,'.$request->input('id')],
            'cost' => 'numeric|min:1',
            'profit_ratio_1' => 'required|numeric|min:1',
            'profit_ratio_2' => 'required|numeric|min:1',
            'geolocation' => 'required',

        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'city_id.required' => 'حقل المدينة مطلوب',
            'district_id.required' => 'حقل الناحية مطلوب',
            'sub_category_id.required' => 'حقل الصنف الفرعي مطلوب',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب أن يتكون من أرقام فقط',
            'phone.digits' => 'حقل الهاتف يجب أن يتكون من 10 خانات',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            'cost.numeric' => 'حقل التكلفة يجب أن يكون رقم',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
            'profit_ratio_1.required' => 'حقل نسبة الأرباح الخارجية مطلوب',
            'profit_ratio_1.numeric' => 'حقل نسبة الأرباح الخارجية يجب أن يكون رقم',
            'profit_ratio_1.min' => 'حقل نسبة الأرباح الخارجية يجب أن يكون أكبر من الصفر',
            'profit_ratio_2.required' => 'حقل نسبة الأرباح الداخلية مطلوب',
            'profit_ratio_2.numeric' => 'حقل نسبة الأرباح الداخلية يجب أن يكون رقم',
            'profit_ratio_2.min' => 'حقل نسبة الأرباح الداخلية يجب أن يكون أكبر من الصفر',
            'geolocation.required' => 'حقل الموقع مطلوب',
        ]);

        
        $place = Place::find($data['id']);

        $place->sub_category_id = $request->input('sub_category_id');
        $place->district_id = $request->input('district_id');
        $place->geolocation = $request->input('geolocation');
        $place->email = $request->input('email');
        $place->phone = $request->input('phone');
        $place->cost = $request->input('cost');
        $place->profit_ratio_1 = $request->input('profit_ratio_1');
        $place->profit_ratio_2 = $request->input('profit_ratio_2');
        $files = $request->files->all();

        $place->images()->delete();
        if ($files) {
            foreach ($files as $name => $file) {
                // dd($name, $file);
                $upload_image_name = time().'_'.$file->getClientOriginalName();
                $file->move('uploads/placeImage', $upload_image_name);
                $place->images()->create( ['image' => "uploads/placeImage/$upload_image_name"]);
            }
        }
        
        $place->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $place->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        
        $place->update();
        
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();
        
        return view("admin-Ar.sections.place-section")->with(['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);

    }
    public function updateEn(Request $request)
    {
        // dd($request);
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'sub_category_id' => 'required',
            'phone' => ['required', 'numeric', 'digits:10'],
            'email' => ['required', 'email', 'unique:places,email,'.$request->input('id')],
            'cost' => 'required|numeric|min:1',
            'profit_ratio_1' => 'required|numeric|min:1',
            'profit_ratio_2' => 'required|numeric|min:1',
            'geolocation' => 'required',

        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'city_id.required' => 'City feild is required',
            'district_id.required' => 'District feild is required',
            'sub_category_id.required' => 'Subcategory feild is required',
            'phone.required' => 'Phone feild is required',
            'phone.numeric' => 'Phone field must consist of numbers only',
            'phone.digits' => 'Phone field must contain 10 characters',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than 0',
            'profit_ratio_1.required' => 'External Profit Ratio feild is required',
            'profit_ratio_1.numeric' => 'External Profit Ratio field must consist of numbers only',
            'profit_ratio_1.min' => 'External Profit Ratio field must be greater than 0',
            'profit_ratio_2.required' => 'Internal Profit Ratio feild is required',
            'profit_ratio_2.numeric' => 'Internal Profit Ratio field must consist of numbers only',
            'profit_ratio_2.min' => 'Internal Profit Ratio field must be greater than 0',
            'geolocation.required' => 'Geolocation feild is required',
        ]);

        
        $place = Place::find($data['id']);

        $place->sub_category_id = $request->input('sub_category_id');
        $place->district_id = $request->input('district_id');
        $place->geolocation = $request->input('geolocation');
        $place->email = $request->input('email');
        $place->phone = $request->input('phone');
        $place->cost = $request->input('cost');
        $place->profit_ratio_1 = $request->input('profit_ratio_1');
        $place->profit_ratio_2 = $request->input('profit_ratio_2');
        $files = $request->files->all();

        $place->images()->delete();
        if ($files) {
            foreach ($files as $name => $file) {
                // dd($name, $file);
                $upload_image_name = time().'_'.$file->getClientOriginalName();
                $file->move('uploads/placeImage', $upload_image_name);
                $place->images()->create( ['image' => "uploads/placeImage/$upload_image_name"]);
            }
        }
        
        $place->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $place->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        
        $place->update();
        
        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();
        
        return view("admin-Ar.sections.place-section")->with(['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $place = Place::find($data['id']);
        $place->translations()->delete();
        $place->images()->delete();
        $place->delete();

        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();
        
        return view("admin-Ar.sections.place-section")->with(['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);

    }
    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $place = Place::find($data['id']);
        $place->translations()->delete();
        $place->images()->delete();
        $place->delete();

        $places = Place::with('translations')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $sub_categories = SubCategory::with('translations')->get();
        
        return view("admin-En.sections.place-section")->with(['places' => $places, 'cities' => $cities, 'districts' => $districts, 'sub_categories' => $sub_categories]);

    }

    public function placeDetailsAr($id){
        $place = Place::with('translations', 'services', 'images')->find($id);

        return view('user-ar.place_details')->with(['place' => $place]);

    }
}
