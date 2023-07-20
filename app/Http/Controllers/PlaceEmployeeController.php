<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use App\Models\User;
use App\Models\Place;
use App\Models\Permission;
use Illuminate\Http\Request;

class PlaceEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $employees = User::with(['translations'])->where('is_employee', '2')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-Ar.sections.employee-place-section', compact('employees', 'places'));

    }
    
    public function indexEn()
    {
        $employees = User::with(['translations'])->where('is_employee', '2')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-En.sections.employee-place-section', compact('employees', 'places'));

    }

    public function placesAr(){
        $places = Place::with(['translations'])->get();

        return view('admin-Ar.employee_places')->with(['places' => $places]);
    }

    public function placesEn(){
        $places = Place::with(['translations'])->get();

        return view('admin-En.employee_places')->with(['places' => $places]);
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
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'user_name' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => [
                'required',
                'min:8',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                // 'confirmed'
            ],
        ], [
            'full_name_ar.required' => 'حقل الاسم الكامل (العربية) مطلوب',
            'full_name_en.required' => 'حقل الاسم الكامل (الإنجليزية) مطلوب',
            'user_name.required' => 'حقل اسم المستخدم مطلوب',
            'user_name.unique' => 'اسم المستخدم هذا موجود من قبل',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'حقل كلمة المرور يجب أن يكون من 8 أحرف أو أرقام على الأقل',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            
        ]);
        

        $place_employee = new User;

        
        $place_employee->user_name = $request->input('user_name');
        $place_employee->email = $request->input('email');
        $place_employee->password = Hash::make($request->input('password'));
        $place_employee->is_employee = '2';

        $place_employee->save();

        $permission = Permission::where('code', 'Like', 'employee_place')->first();
        $place_employee->permissions()->attach($permission, [
            "place_id" => $request->input("place_id")
       ]);
        
        $place_employee->translations()->create([
            'full_name'=>$request->input('full_name_en'), 
           
            'locale' => 'en'
        ]);
        
        $place_employee->translations()->create([
            'full_name'=>$request->input('full_name_ar'), 
           
            'locale' => 'ar'
        ]);

        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '2')->get();
        $permissions = Permission::with('translations')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-Ar.sections.employee-place-section', compact('employees', 'permissions', 'places'));


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:

        $request->validate([
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'user_name' => ['required', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => [
                'required',
                'min:8',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                // 'confirmed'
            ],
        ], [
            'full_name_ar.required' => 'Full Name(Arabic) feild is required',
            'full_name_en.required' => 'Full Name(English) feild is required',
            'user_name.required' => 'Username feild is required',
            'user_name.unique' => 'This user name already has an account',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            'password.required' => 'Password feild is required',
            'password.min' => 'Password field must be at least 8 characters or numbers long',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            
        ]);
        

        $place_employee = new User;

        
        $place_employee->user_name = $request->input('user_name');
        $place_employee->email = $request->input('email');
        $place_employee->password = Hash::make($request->input('password'));
        $place_employee->is_employee = '2';

        $place_employee->save();

        $permission = Permission::where('code', 'Like', 'employee_place')->first();
        $place_employee->permissions()->attach($permission, [
            "place_id" => $request->input("place_id")
       ]);
        
        $place_employee->translations()->create([
            'full_name'=>$request->input('full_name_en'), 
           
            'locale' => 'en'
        ]);
        
        $place_employee->translations()->create([
            'full_name'=>$request->input('full_name_ar'), 
           
            'locale' => 'ar'
        ]);

        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '2')->get();
        $permissions = Permission::with('translations')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-En.sections.employee-place-section', compact('employees', 'permissions', 'places'));



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProfile $employeeProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function updateAr(Request $request)
    {

        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'user_name' => ['required', 'unique:users,user_name,'.$request->input('id')],
            'email' => ['required', 'email', 'unique:users,email,'.$request->input('id')],
            // 'password' => [
            //     'required',
            //     'min:8',
            //     // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //     // 'confirmed'
            // ],
        ], [
            'full_name_ar.required' => 'حقل الاسم الكامل (العربية) مطلوب',
            'full_name_en.required' => 'حقل الاسم الكامل (الإنجليزية) مطلوب',
            'user_name.required' => 'حقل اسم المستخدم مطلوب',
            'user_name.unique' => 'اسم المستخدم هذا موجود من قبل',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            // 'password.required' => 'حقل كلمة المرور مطلوب',
            // 'password.min' => 'حقل كلمة المرور يجب أن يكون من 8 أحرف أو أرقام على الأقل',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            
        ]);

        
        $place_employee = User::find($data['id']);

        $place_employee->user_name = $request->input('user_name');
        $place_employee->email = $request->input('email');
        // $place_employee->password = $request->input('password');
        // $place_employee->is_employee = '2';

        $permission = Permission::where('code', 'Like', 'employee_place')->first();
        $place_employee->permissions()->syncWithPivotValues($permission, ['place_id' => $request->input("place_id")]);
        

        $place_employee->translations()->where('locale', 'en')->update([
            'full_name'=>$request->input('full_name_en'), 
            
        ]);
        $place_employee->translations()->where('locale', 'ar')->update([
            'full_name'=>$request->input('full_name_ar'), 
            
        ]);
        
        $place_employee->update();
        
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '2')->get();
        $permissions = Permission::with('translations')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-Ar.sections.employee-place-section', compact('employees', 'permissions', 'places'));

    }

    public function updateEn(Request $request)
    {
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'user_name' => ['required', 'unique:users,user_name,'.$request->input('id')],
            'email' => ['required', 'email', 'unique:users,email,'.$request->input('id')],
            // 'password' => [
            //     'required',
            //     'min:8',
            //     // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //     // 'confirmed'
            // ],
        ], [
            'full_name_ar.required' => 'Full Name(Arabic) feild is required',
            'full_name_en.required' => 'Full Name(English) feild is required',
            'user_name.required' => 'Username feild is required',
            'user_name.unique' => 'This user name already has an account',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            // 'password.required' => 'Password feild is required',
            // 'password.min' => 'Password field must be at least 8 characters or numbers long',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
        ]);

        
        $place_employee = User::find($data['id']);

        $place_employee->user_name = $request->input('user_name');
        $place_employee->email = $request->input('email');
        // $place_employee->password = $request->input('password');
        // $place_employee->is_employee = '2';

        $permission = Permission::where('code', 'Like', 'employee_place')->first();
        $place_employee->permissions()->syncWithPivotValues($permission, ['place_id' => $request->input("place_id")]);
        

        $place_employee->translations()->where('locale', 'en')->update([
            'full_name'=>$request->input('full_name_en'), 
            
        ]);
        $place_employee->translations()->where('locale', 'ar')->update([
            'full_name'=>$request->input('full_name_ar'), 
            
        ]);
        
        $place_employee->update();
        
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '2')->get();
        $permissions = Permission::with('translations')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-En.sections.employee-place-section', compact('employees', 'permissions', 'places'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeProfile  $employeeProfile
     * @return \Illuminate\Http\Response
     */
    public function destroyAr(Request $request)
    {
        $data=$request->input();

        $employee = User::find($data['id']);
        $employee->translations()->delete();

        $employee->delete();

        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '2')->get();
        $permissions = Permission::with('translations')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-Ar.sections.employee-place-section', compact('employees', 'permissions', 'places'));

    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $employee = User::find($data['id']);
        $employee->translations()->delete();

        $employee->delete();

        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '2')->get();
        $permissions = Permission::with('translations')->get();
        $places = Place::with(['translations'])->get();

        return view('admin-En.sections.employee-place-section', compact('employees', 'permissions', 'places'));

    }

    
}
