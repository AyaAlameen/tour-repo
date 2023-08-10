<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfileAr(Request $request)
    {
        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('كلمة المرور القديمة غير صحيحة.');
                    }
                },
            ],
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password'
            
        ], [
            'old_password.required' => 'حقل كلمة المرور القديمة مطلوب',
            'password.required' => 'حقل كلمة المرور الجديدة مطلوب',
            'password.min' => 'حقل كلمة المرور الجديدة يجب أن يكون من 8 أحرف أو أرقام على الأقل',
            'password_confirmation.required' => 'حقل تأكيد كلمة المرور الجديدة مطلوب',
            'password_confirmation.same' => 'حقل تأكيد كلمة المرور الجديدة غير مطابق',
            
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->input('password'));
                $user->update();
        }
        
    }

    public function editProfileEn(Request $request)
    {
        $request->validate([
            'old_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('The old password is incorrect.');
                    }
                },
            ],
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password'
            
        ], [
            'old_password.required' => 'Old Password feild is required',
            'password.required' => 'New Password feild is required',
            'password.min' => 'New Password field must be at least 8 characters or numbers long',
            'password_confirmation.required' => 'New Password Confirmation feild is required',
            'password_confirmation.same' => 'New Password Confirmation field does not match',
            
        ]);

        if (Hash::check($request->old_password, Auth::user()->password)) {
            
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->input('password'));
                $user->update();
        }
        
    }
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
