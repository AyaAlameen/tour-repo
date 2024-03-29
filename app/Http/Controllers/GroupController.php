<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\TouristGuide;
use App\Models\Place;
use App\Models\District;
use App\Models\City;
use App\Models\Service;
use App\Models\TransportCompany;
use App\Models\Transportation;
use App\Models\GroupTransportation;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }
    
    public function indexEn()
    {
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function getGuidesAr()
    {
        
        $guides = TouristGuide::with('translations')->get();

        return view('admin-Ar.groups', compact('guides'));
    }
    public function getGuidesEn()
    {
        
        $guides = TouristGuide::with('translations')->get();

        return view('admin-En.groups', compact('guides'));
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
            'name_ar' => 'required',
            'name_en' => 'required',
            'tourist_guide_id' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'people_count' => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:1',
        ], [ 
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'tourist_guide_id.required' => 'حقل الدليل السياحي مطلوب',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون نفس تاريخ البداية أو بعده',
            'people_count.required' => 'حقل عدد الأشخاص مطلوب',
            'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
            'people_count.min' => 'حقل عدد الأشخاص يجب أن يكون أكبر من الصفر',
            'cost.required' => 'حقل التكلفة مطلوب',
            'cost.numeric' => 'حقل التكلفة يجب أن يتكون من أرقام فقط',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
        ]);
        

        $group = new Group;
        $group->tourist_guide_id = $request->input('tourist_guide_id');
        $group->start_date = $request->input('start_date');
        $group->end_date = $request->input('end_date');
        $group->people_count = $request->input('people_count');
        $group->cost = $request->input('cost');
        $group->save();

        $group->translations()->create(['name'=>$request->input('name_en'), 'description' => $request->input('description_en'), 'locale' => 'en']);
        $group->translations()->create(['name'=>$request->input('name_ar'), 'description' => $request->input('description_ar'),'locale' => 'ar']);
        
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'tourist_guide_id' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'people_count' => 'required|numeric',
            'cost' => 'required|numeric|min:1',
        ], [ 
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'tourist_guide_id.required' => 'Tourist Guide feild is required',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date format',
            'start_date.after' => "Start Date field must be after today's date",
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date format',
            'end_date.after_or_equal' => 'End date field must be the same as or later than the start date',
            'people_count.required' => 'People Count Date feild is required',
            'people_count.numeric' => 'People Count field must consist of numbers only',
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than zero',
        ]);
        

        $group = new Group;
        $group->tourist_guide_id = $request->input('tourist_guide_id');
        $group->start_date = $request->input('start_date');
        $group->end_date = $request->input('end_date');
        $group->people_count = $request->input('people_count');
        $group->cost = $request->input('cost');
        $group->save();

        $group->translations()->create(['name'=>$request->input('name_en'), 'description' => $request->input('description_en'), 'locale' => 'en']);
        $group->translations()->create(['name'=>$request->input('name_ar'), 'description' => $request->input('description_ar'),'locale' => 'ar']);
        
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);


    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
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
            'tourist_guide_id' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'people_count' => 'required|numeric',
            'cost' => 'required|numeric|min:1',
        ], [ 
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'tourist_guide_id.required' => 'حقل الدليل السياحي مطلوب',
            'start_date.required' => 'حقل تاريخ البداية مطلوب',
            'start_date.date' => 'حقل تاريخ البداية يجب أن يكون تاريخ',
            'start_date.after' => 'حقل تاريخ البداية يجب أن يكون بعد تاريخ اليوم',
            'end_date.required' => 'حقل تاريخ النهاية مطلوب',
            'end_date.date' => 'حقل تاريخ النهاية يجب أن يكون تاريخ',
            'end_date.after_or_equal' => 'حقل تاريخ النهاية يجب أن يكون نفس تاريخ البداية أو بعده',
            'people_count.required' => 'حقل عدد الأشخاص مطلوب',
            'people_count.numeric' => 'حقل عدد الأشخاص يجب أن يتكون من أرقام فقط',
            'cost.required' => 'حقل التكلفة مطلوب',
            'cost.numeric' => 'حقل التكلفة يجب أن يتكون من أرقام فقط',
            'cost.min' => 'حقل التكلفة يجب أن يكون أكبر من الصفر',
        ]);

        
        $group = Group::find($data['id']);

        $group->tourist_guide_id = $request->input('tourist_guide_id');
        $group->start_date = $request->input('start_date');
        $group->end_date = $request->input('end_date');
        $group->people_count = $request->input('people_count');
        $group->cost = $request->input('cost');

        
        $group->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $group->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $group->update();
        
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'tourist_guide_id' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after_or_equal:start_date',
            'people_count' => 'required|numeric',
            'cost' => 'required|numeric|min:1',
        ], [ 
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'tourist_guide_id.required' => 'Tourist Guide feild is required',
            'start_date.required' => 'Start Date feild is required',
            'start_date.date' => 'Start date field Must be a date format',
            'start_date.after' => "Start Date field must be after today's date",
            'end_date.required' => 'End Date feild is required',
            'end_date.date' => 'End date field Must be a date format',
            'end_date.after_or_equal' => 'End date field must be the same as or later than the start date',
            'people_count.required' => 'People Count Date feild is required',
            'people_count.numeric' => 'People Count field must consist of numbers only',
            'cost.required' => 'Cost feild is required',
            'cost.numeric' => 'Cost field must consist of numbers only',
            'cost.min' => 'Cost field must be greater than zero',
        ]);

        $group = Group::find($data['id']);

        $group->tourist_guide_id = $request->input('tourist_guide_id');
        $group->start_date = $request->input('start_date');
        $group->end_date = $request->input('end_date');
        $group->people_count = $request->input('people_count');
        $group->cost = $request->input('cost');

        
        $group->translations()->where('locale', 'en')->update([
            'name'=>$request->input('name_en'), 
            'description' => $request->input('description_en'),
        ]);
        $group->translations()->where('locale', 'ar')->update([
            'name'=>$request->input('name_ar'), 
            'description' => $request->input('description_ar'),
        ]);
        
        $group->update();
        
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $group = Group::find($data['id']);
        $group->translations()->delete();
        $group->places()->detach();
        $group->transportations()->detach();
        $group->delete();

        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $group = Group::find($data['id']);
        $group->translations()->delete();
        $group->places()->detach();
        $group->transportations()->detach();
        $group->delete();

        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }


    public function addGroupDestinationAr(Request $request){
        // dd($request);
        $data=$request->input();

        $request->validate([
            'group_id' => 'required',
            'place_id' => 'required',
            
        ], [
            'group_id.required' => 'حقل الجروب مطلوب',
            'place_id.required' => 'حقل المكان مطلوب',
            
        ]);

        $group = Group::find($data['group_id']);
        // $group->places()>syncWithPivotValues($data['place_id'], ['service_id' => $data['service_id'] ?? null]); 
        $group->places()->attach($data['place_id'], ['service_id' => $data['service_id'] ?? null]);
        // $group_place->pl->group_id = $data['group_id'];
        // $group_place->place_id = $data['place_id'];
        // $group_place->service_id = $data['service_id'] ?? null;


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function addGroupDestinationEn(Request $request){
        // dd($request);
        $data=$request->input();

        $request->validate([
            'group_id' => 'required',
            'place_id' => 'required',
            
        ], [
            'group_id.required' => 'Group feild is required',
            'place_id.required' => 'Place feild is required',
            
        ]);

        $group = Group::find($data['group_id']);
        // $group->places()>syncWithPivotValues($data['place_id'], ['service_id' => $data['service_id'] ?? null]); 
        $group->places()->attach($data['place_id'], ['service_id' => $data['service_id'] ?? null]);
        // $group_place->pl->group_id = $data['group_id'];
        // $group_place->place_id = $data['place_id'];
        // $group_place->service_id = $data['service_id'] ?? null;


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function deleteGroupDestinationAr(Request $request){
        // dd($request->all());
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            
        ]);

        $group_place = \DB::table('group_places')
        ->where('id', $data['id'])
        ->delete();

        


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function deleteGroupDestinationEn(Request $request){
        // dd($request->all());
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            
        ]);

        $group_place = \DB::table('group_places')
        ->where('id', $data['id'])
        ->delete();

        


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }
    

    public function addGroupTransportationAr(Request $request){
        // dd($request);
        $data=$request->input();

        // dd($data['dates']);
        $request->validate([
            'group_id' => 'required',
            'transportation_id' => 'required',
            'dates.*' => 'required',
            
        ], [
            'group_id.required' => 'حقل الجروب مطلوب',
            'transportation_id.required' => 'حقل وسيلة النقل مطلوب',
            'dates.*.required' => 'حقل التاريخ مطلوب',
            
        ]);

        // dd($data['dates']);

        $transportation_dates = GroupTransportation::where('transportation_id', $data['transportation_id'])->pluck('dates')->toArray();
        
        $new_dates = array();
        // dd( $new_dates);
        foreach ($transportation_dates as $transport) {
            foreach ($transport as $date) {
                array_push($new_dates, $date);
            }
        }
        $request->validate([
            'dates' => [
                'exists' =>
                function ($attribute, $value, $fail) use($request, $new_dates, $data) {
                    foreach ($new_dates as $date) {
                        if (in_array($date, $data['dates'])) {
                                $fail(' وسيلة النقل هذه تم حجزها في تاريخ ' .$date.' من قبل ');
                            }
                            
                        }
                },
            ]
            
        ]);
            

        // dd($new_dates);
        $group = Group::find($data['group_id']);
        $group->transportations()->attach($data['transportation_id'], ['dates' => $data['dates'] ?? null]);
        


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function addGroupTransportationEn(Request $request){
        $data=$request->input();
        // dd($request);
        $request->validate([
            'group_id' => 'required',
            'transportation_id' => 'required',
            'dates.*' => 'required',
            
        ], [
            'group_id.required' => 'Group feild is required',
            'transportation_id.required' => 'Transport feild is required',
            'dates.*.required' => 'Date feild is required',
            
        ]);

        // dd($data['dates']);

        $transportation_dates = GroupTransportation::where('transportation_id', $data['transportation_id'])->pluck('dates')->toArray();
        
        $new_dates = array();
        // dd( $new_dates);
        foreach ($transportation_dates as $transport) {
            foreach ($transport as $date) {
                array_push($new_dates, $date);
            }
        }
        $request->validate([
            'dates' => [
                'exists' =>
                function ($attribute, $value, $fail) use($request, $new_dates, $data) {
                    foreach ($new_dates as $date) {
                        if (in_array($date, $data['dates'])) {
                                $fail('This transportation was booked on '.$date.' before');
                            }
                            
                        }
                },
            ]
            
        ]);

        $group = Group::find($data['group_id']);
        $group->transportations()->attach($data['transportation_id'], ['dates' => $data['dates'] ?? null]);
        


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }

    public function deleteGroupTransportationAr(Request $request){
        // dd($request->all());
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            
        ]);

        $group_transportation = \DB::table('group_transportations')
        ->where('id', $data['id'])
        ->delete();

        


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }
    public function deleteGroupTransportationEn(Request $request){
        // dd($request->all());
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            
        ]);

        $group_transportation = \DB::table('group_transportations')
        ->where('id', $data['id'])
        ->delete();

        


        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();
        $places = Place::with('translations', 'district', 'services')->get();
        $cities = City::with('translations')->get();
        $districts = District::with('translations')->get();
        $services = Service::with('translations')->get();
        $companies = TransportCompany::with('translations')->get();
        $transportations = Transportation::with('translations')->get();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 
                                                                'guides' => $guides, 
                                                                'places' => $places,
                                                                'cities' => $cities,
                                                                'districts' => $districts,
                                                                'services' => $services,
                                                                'companies' => $companies,
                                                                'transportations' => $transportations,
                                                            ]);
    }
}
