<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class EmployeeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAr()
    {
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();
        return view('admin-Ar.sections.employee-section', compact('employees', 'permissions'));

    }
    
    public function indexEn()
    {
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();
        return view('admin-En.sections.employee-section', compact('employees', 'permissions'));

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
            'image' => 'required',
            'user_name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => [
                'required',
                'min:8',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                // 'confirmed'
            ],
            'phone' => ['required', 'numeric', 'digits:10'],
            'salary' => 'required|numeric',
            'identifier' => ['required', 'numeric', 'digits:11'],
        ], [
            'full_name_ar.required' => 'حقل الاسم الكامل (العربية) مطلوب',
            'full_name_en.required' => 'حقل الاسم الكامل (الإنجليزية) مطلوب',
            'image.required' => 'حقل الصورة مطلوب',
            'user_name.required' => 'حقل اسم المستخدم مطلوب',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.min' => 'حقل كلمة المرور يجب أن يكون من 8 أحرف أو أرقام على الأقل',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب أن يتكون من أرقام فقط',
            'phone.digits' => 'حقل الهاتف يجب أن يتكون من 10 خانات',
            'salary.required' => 'حقل الراتب مطلوب',
            'salary.numeric' => 'حقل الراتب يجب أن يتكون من أرقام فقط',
            'identifier.required' => 'حقل الرقم الوطني مطلوب',
            'identifier.numeric' => 'حقل الرقم الوطني يجب أن يتكون من أرقام فقط',
            'identifier.digits' => 'حقل الرقم الوطني يجب أن يتكون من 11 خانات',
        ]);
        

        $employee = new User;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/employeeImage', $upload_image_name);
            $employee->image = 'uploads/employeeImage/'.$upload_image_name;
        }
        $employee->user_name = $request->input('user_name');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password'));
        $employee->phone = $request->input('phone');
        $employee->is_employee = '1';

        $employee->save();

        $employee->employeeProfile()->create([
            'user_id' => $employee->id, 
            'salary' => $request->input('salary'), 
            'identifier' => $request->input('identifier')
        ]);

        
        $employee->translations()->create([
            'full_name'=>$request->input('full_name_en'), 
            'job'=>$request->input('job_en'), 
            'address'=>$request->input('address_en'), 
            'locale' => 'en'
        ]);
        
        $employee->translations()->create([
            'full_name'=>$request->input('full_name_ar'), 
            'job'=>$request->input('job_ar'), 
            'address'=>$request->input('address_ar'), 
            'locale' => 'ar'
        ]);

        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-Ar.sections.employee-section', compact('employees', 'permissions'));


    }

    public function storeEn(Request $request)
    {
        $data=$request->input();
        //validation:

        $request->validate([
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'image' => 'required',
            'user_name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => [
                'required',
                'min:8',
                // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                // 'confirmed'
            ],
            'phone' => ['required', 'numeric', 'digits:10'],
            'salary' => 'required|numeric',
            'identifier' => ['required', 'numeric', 'digits:11'],
        ], [
            'full_name_ar.required' => 'Full Name(Arabic) feild is required',
            'full_name_en.required' => 'Full Name(English) feild is required',
            'image.required' => 'Image feild is required',
            'user_name.required' => 'Username feild is required',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            'password.required' => 'Password feild is required',
            'password.min' => 'Password field must be at least 8 characters or numbers long',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            'phone.required' => 'Phone feild is required',
            'phone.numeric' => 'Phone field must consist of numbers only',
            'phone.digits' => 'Phone field must contain 10 characters',
            'salary.required' => 'Salary feild is required',
            'salary.numeric' => 'Salary field must consist of numbers only',
            'identifier.required' => 'Identifier feild is required',
            'identifier.numeric' => 'Identifier field must consist of numbers only',
            'identifier.digits' => 'Identifier field must contain 11 characters',
        ]);
        

        $employee = new User;

        if($request->has('image')){
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/employeeImage', $upload_image_name);
            $employee->image = 'uploads/employeeImage/'.$upload_image_name;
        }
        $employee->user_name = $request->input('user_name');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password'));
        $employee->phone = $request->input('phone');
        $employee->is_employee = '1';

        $employee->save();

        $employee->employeeProfile()->create([
            'user_id' => $employee->id, 
            'salary' => $request->input('salary'), 
            'identifier' => $request->input('identifier')
        ]);

        
        $employee->translations()->create([
            'full_name'=>$request->input('full_name_en'), 
            'job'=>$request->input('job_en'), 
            'address'=>$request->input('address_en'), 
            'locale' => 'en'
        ]);
        
        $employee->translations()->create([
            'full_name'=>$request->input('full_name_ar'), 
            'job'=>$request->input('job_ar'), 
            'address'=>$request->input('address_ar'), 
            'locale' => 'ar'
        ]);

        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-En.sections.employee-section', compact('employees', 'permissions'));



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
            'user_name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,'.$request->input('id')],
            // 'password' => [
            //     'required',
            //     'min:8',
            //     // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //     // 'confirmed'
            // ],
            'phone' => ['required', 'numeric', 'digits:10'],
            'salary' => 'required|numeric',
            'identifier' => ['required', 'numeric', 'digits:11'],
        ], [
            'full_name_ar.required' => 'حقل الاسم الكامل (العربية) مطلوب',
            'full_name_en.required' => 'حقل الاسم الكامل (الإنجليزية) مطلوب',
            'user_name.required' => 'حقل اسم المستخدم مطلوب',
            'email.required' => 'حقل الإيميل مطلوب',
            'email.email' => 'حقل الإيميل يجب أن يحقق شروط شكل الإيميل',
            'email.unique' => 'هذا الإيميل لديه حساب من قبل',
            // 'password.required' => 'حقل كلمة المرور مطلوب',
            // 'password.min' => 'حقل كلمة المرور يجب أن يكون من 8 أحرف أو أرقام على الأقل',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            'phone.required' => 'حقل الهاتف مطلوب',
            'phone.numeric' => 'حقل الهاتف يجب أن يتكون من أرقام فقط',
            'phone.digits' => 'حقل الهاتف يجب أن يتكون من 10 خانات',
            'salary.required' => 'حقل الراتب مطلوب',
            'salary.numeric' => 'حقل الراتب يجب أن يتكون من أرقام فقط',
            'identifier.required' => 'حقل الرقم الوطني مطلوب',
            'identifier.numeric' => 'حقل الرقم الوطني يجب أن يتكون من أرقام فقط',
            'identifier.digits' => 'حقل الرقم الوطني يجب أن يتكون من 11 خانات',
        ]);

        
        $employee = User::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/employeeImage', $upload_image_name);
            $employee->image = 'uploads/employeeImage/'.$upload_image_name;
        }

        $employee->user_name = $request->input('user_name');
        $employee->email = $request->input('email');
        // $employee->password = $request->input('password');
        $employee->phone = $request->input('phone');
        $employee->is_employee = '1';

        $employee->employeeProfile()->where('user_id', $data['id'])->update([
            'salary' => $request->input('salary'), 
            'identifier' => $request->input('identifier')
        ]);

        $employee->translations()->where('locale', 'en')->update([
            'full_name'=>$request->input('full_name_en'), 
            'job'=>$request->input('job_en'), 
            'address'=>$request->input('address_en'),
        ]);
        $employee->translations()->where('locale', 'ar')->update([
            'full_name'=>$request->input('full_name_ar'), 
            'job'=>$request->input('job_ar'), 
            'address'=>$request->input('address_ar'),
        ]);
        
        $employee->update();
        
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-Ar.sections.employee-section', compact('employees', 'permissions'));
    }

    public function updateEn(Request $request)
    {
        $data=$request->input();

        $request->validate([
            'id' => 'required',
            'full_name_ar' => 'required',
            'full_name_en' => 'required',
            'user_name' => 'required',
            'email' => ['required', 'email', 'unique:users,email,'.$request->input('id')],
            // 'password' => [
            //     'required',
            //     'min:8',
            //     // 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            //     // 'confirmed'
            // ],
            'phone' => ['required', 'numeric', 'digits:10'],
            'salary' => 'required|numeric',
            'identifier' => ['required', 'numeric', 'digits:11'],
        ], [
            'full_name_ar.required' => 'Full Name(Arabic) feild is required',
            'full_name_en.required' => 'Full Name(English) feild is required',
            'user_name.required' => 'Username feild is required',
            'email.required' => 'Email feild is required',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            // 'password.required' => 'Password feild is required',
            // 'password.min' => 'Password field must be at least 8 characters or numbers long',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
            'phone.required' => 'Phone feild is required',
            'phone.numeric' => 'Phone field must consist of numbers only',
            'phone.digits' => 'Phone field must contain 10 characters',
            'salary.required' => 'Salary feild is required',
            'salary.numeric' => 'Salary field must consist of numbers only',
            'identifier.required' => 'Identifier feild is required',
            'identifier.numeric' => 'Identifier field must consist of numbers only',
            'identifier.digits' => 'Identifier field must contain 11 characters',
        ]);

        
        $employee = User::find($data['id']);

        if($request->files->has('image')){
            $image_name = $request->files->get('image');
            $org_name = $image_name->getClientOriginalName();
            $upload_image_name = time().'_'.$org_name;
            $image_name->move('uploads/employeeImage', $upload_image_name);
            $employee->image = 'uploads/employeeImage/'.$upload_image_name;
        }

        $employee->user_name = $request->input('user_name');
        $employee->email = $request->input('email');
        // $employee->password = $request->input('password');
        $employee->phone = $request->input('phone');
        $employee->is_employee = '1';

        $employee->employeeProfile()->where('user_id', $data['id'])->update([
            'salary' => $request->input('salary'), 
            'identifier' => $request->input('identifier')
        ]);

        $employee->translations()->where('locale', 'en')->update([
            'full_name'=>$request->input('full_name_en'), 
            'job'=>$request->input('job_en'), 
            'address'=>$request->input('address_en'),
        ]);
        $employee->translations()->where('locale', 'ar')->update([
            'full_name'=>$request->input('full_name_ar'), 
            'job'=>$request->input('job_ar'), 
            'address'=>$request->input('address_ar'),
        ]);
        
        $employee->update();
        
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-En.sections.employee-section', compact('employees', 'permissions'));
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

        $employee = EmployeeProfile::where('user_id', $data['id']);
        $employee->delete();


        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-Ar.sections.employee-section', compact('employees', 'permissions'));

    }

    public function destroyEn(Request $request)
    {
        $data=$request->input();

        $employee = User::find($data['id']);
        $employee->translations()->delete();
        $employee->delete();

        $employee = EmployeeProfile::where('user_id', $data['id']);
        $employee->delete();


        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-En.sections.employee-section', compact('employees', 'permissions'));

    }

    public function permissionsAr(Request $request){
        
        $data=$request->input();

        $employee = User::find($data['id']);
        $employee->permissions()->sync($data['permission_id']); 
        
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-Ar.sections.employee-section', compact('employees', 'permissions'));

    }

    public function permissionsEn(Request $request){
        $data=$request->input();

        $employee = User::find($data['id']);
        $employee->permissions()->sync($data['permission_id']); 
        
        $employees = User::with(['translations', 'employeeProfile', 'permissions'])->where('is_employee', '1')->get();
        $permissions = Permission::with('translations')->get();

        return view('admin-En.sections.employee-section', compact('employees', 'permissions'));

    }
}
