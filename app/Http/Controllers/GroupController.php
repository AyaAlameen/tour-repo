<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\TouristGuide;
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
        return view('admin-Ar.sections.group-section', compact('groups', 'guides'));

    }
    
    public function indexEn()
    {
        $groups = Group::with('translations')->get();
        $guides = TouristGuide::with('translations')->get();

        return view('admin-En.sections.group-section', compact('groups', 'guides'));
    }

    public function getGuidesAr()
    {
        
        $guides = TouristGuide::with('translations')->get();

        return view('admin-Ar.groups', compact('guides'));
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
            'people_count' => 'required|numeric',
            'cost' => 'required|numeric',
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
        
        $groups = Group::with(['translations', 'touristGuide'])->get();
        $guides = TouristGuide::all();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 'guides' => $guides]);


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
            'cost' => 'required|numeric',
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
        
        $groups = Group::with(['translations', 'touristGuide'])->get();
        $guides = TouristGuide::all();
        
        return view("admin-En.sections.group-section")->with(['groups' => $groups, 'guides' => $guides]);



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
            'cost' => 'required|numeric',
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
        
        $groups = Group::with(['translations', 'touristGuide'])->get();
        $guides = TouristGuide::all();
        
        return view("admin-Ar.sections.group-section")->with(['groups' => $groups, 'guides' => $guides]);

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
            'cost' => 'required|numeric',
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
        ]);

        $category = Category::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/categoryImage', $upload_image_name);
            $category->image = 'uploads/categoryImage/'.$upload_image_name;
        }

        $category->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en']
        ]);
        $category->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar']
        ]);
        
        $category->update();
        
        $categories = Category::with('translations')->get();
        
        return view("admin-En.sections.category-section")->with(['categories' => $categories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
