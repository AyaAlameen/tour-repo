<?php

namespace App\Http\Controllers;

use App\Models\TouristGuide;
use Illuminate\Http\Request;

class TouristGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $guides = TouristGuide::with('translations')->get();
        return view('admin-Ar.sections.tourist-guide-section', compact('guides'));

    }
    
    public function indexEn()
    {
        $guides = TouristGuide::with('translations')->get();
        return view('admin-En.sections.tourist-guide-section', compact('guides'));

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
            'salary' => 'required|numeric',
            'image' =>'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10']
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'image.required' => 'حقل الصورة مطلوب',
            'salary.required' => 'حقل الراتب مطلوب',
            'salary.numeric' => 'حقل الراتب يجب أن يتكون من أرقام فقط',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب أن يتكون من أرقام فقط',
            'phone.digits' => 'حقل الهاتف يجب أن يتكون من 10 خانات',
        ]);
        $guide = new TouristGuide;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/touristGuideImage', $upload_image_name);
            $guide->image = 'uploads/touristGuideImage/'.$upload_image_name;
        }
        $guide->salary = $request->input('salary');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');
        $guide->save();

        $guide->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'certificates'=>$request->input('certificates_en'), 'locale' => 'en']);
        $guide->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'certificates'=>$request->input('certificates_ar'), 'locale' => 'ar']);
        
        $guides = TouristGuide::with('translations')->get();
        
        return view("admin-Ar.sections.tourist-guide-section")->with(['guides' => $guides]);


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'salary' => 'required|numeric',
            'image' =>'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10']
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'image.required' => 'Image feild is required',
            'salary.required' => 'Salary feild is required',
            'salary.numeric' => 'Salary field must consist of numbers only',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'phone.required' => 'Phone feild is required',
            'phone.numeric' => 'Phone field must consist of numbers only',
            'phone.digits' => 'Phone field must contain 10 characters',
        ]);
        $guide = new TouristGuide;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/touristGuideImage', $upload_image_name);
            $guide->image = 'uploads/touristGuideImage/'.$upload_image_name;
        }
        $guide->salary = $request->input('salary');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');
        $guide->save();

        $guide->translations()->create(['name'=>$request->input('name_en'), 'description'=>$request->input('description_en'), 'certificates'=>$request->input('certificates_en'), 'locale' => 'en']);
        $guide->translations()->create(['name'=>$request->input('name_ar'), 'description'=>$request->input('description_ar'), 'certificates'=>$request->input('certificates_ar'), 'locale' => 'ar']);
        
        $guides = TouristGuide::with('translations')->get();
        
        return view("admin-En.sections.tourist-guide-section")->with(['guides' => $guides]);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TouristGuide  $touristGuide
     * @return \Illuminate\Http\Response
     */
    public function show(TouristGuide $touristGuide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TouristGuide  $touristGuide
     * @return \Illuminate\Http\Response
     */
    public function edit(TouristGuide $touristGuide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TouristGuide  $touristGuide
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {

        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'salary' => 'required|numeric',
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10']
        ], [
            'name_ar.required' => 'حقل الاسم (العربية) مطلوب',
            'name_en.required' => 'حقل الاسم (الإنجليزية) مطلوب',
            'salary.required' => 'حقل الراتب مطلوب',
            'salary.numeric' => 'حقل الراتب يجب أن يتكون من أرقام فقط',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب أن يتكون من أرقام فقط',
            'phone.digits' => 'حقل الهاتف يجب أن يتكون من 10 خانات',
        ]);

        $guide = TouristGuide::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/touristGuideImage', $upload_image_name);
            $guide->image = 'uploads/touristGuideImage/'.$upload_image_name;
        }
        $guide->salary = $request->input('salary');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');

        $guide->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en'],
            'description'=>  $data['description_en'],
            'certificates'=>  $data['certificates_en']
        ]);
        $guide->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar'],
            'description'=>  $data['description_ar'],
            'certificates'=>  $data['certificates_ar']
        ]);
        
        $guide->update();
        
        $guides = TouristGuide::with('translations')->get();
        
        return view("admin-Ar.sections.tourist-guide-section")->with(['guides' => $guides]);
    }

    public function updateEn(Request $request)
    {
        $data=$request->input();
        
        $request->validate([
            'id' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'salary' => 'required|numeric',
            'email' => ['required', 'email'],
            'phone' => ['required', 'numeric', 'digits:10']
        ], [
            'name_ar.required' => 'Name(Arabic) feild is required',
            'name_en.required' => 'Name(English) feild is required',
            'salary.required' => 'Salary feild is required',
            'salary.numeric' => 'Salary field must consist of numbers only',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'phone.required' => 'Phone feild is required',
            'phone.numeric' => 'Phone field must consist of numbers only',
            'phone.digits' => 'Phone field must contain 10 characters',
        ]);

        $guide = TouristGuide::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/touristGuideImage', $upload_image_name);
            $guide->image = 'uploads/touristGuideImage/'.$upload_image_name;
        }
        $guide->salary = $request->input('salary');
        $guide->phone = $request->input('phone');
        $guide->email = $request->input('email');

        $guide->translations()->where('locale', 'en')->update([
            'name'=>  $data['name_en'],
            'description'=>  $data['description_en'],
            'certificates'=>  $data['certificates_en']
        ]);
        $guide->translations()->where('locale', 'ar')->update([
            'name'=>  $data['name_ar'],
            'description'=>  $data['description_ar'],
            'certificates'=>  $data['certificates_ar']
        ]);
        
        $guide->update();
        
        $guides = TouristGuide::with('translations')->get();
        
        return view("admin-En.sections.tourist-guide-section")->with(['guides' => $guides]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TouristGuide  $touristGuide
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $guide = TouristGuide::find($data['id']);
        $guide->translations()->delete();
        $guide->delete();

        $guides = TouristGuide::with('translations')->get();
        
        return view("admin-Ar.sections.tourist-guide-section")->with(['guides' => $guides]);
    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $guide = TouristGuide::find($data['id']);
        $guide->translations()->delete();
        $guide->delete();

        $guides = TouristGuide::with('translations')->get();
        
        return view("admin-En.sections.tourist-guide-section")->with(['guides' => $guides]);
    }
}
