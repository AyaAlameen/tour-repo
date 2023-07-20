<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session_start();
        $_SESSION['prev_page'] = $_SERVER['HTTP_REFERER'];
        // dd($_SESSION['prev_page']);
        $this->redirectTo = $this->return_prev_page();
        $this->middleware('guest');
    }
    public function return_prev_page()
    {
        // session_start();
        if(isset($_SESSION['prev_page'])) {
            $prevPage = $_SESSION['prev_page'];
            unset($_SESSION['prev_page']);
            return $prevPage;
        } else {
            // إذا لم يتم العثور على عنوان URL للصفحة السابقة، يمكنك تحديد الصفحة التي ترغب في توجيه المستخدم إليها هنا
            return '/user_home_arabic';
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'image'=>['image','mimes:jpg,png,jpeg,gif,svg'],
        
        ], [ 
            'user_name.required' => 'User Name feild is required',
            'user_name.string' => 'User Name feild must be string',
            'user_name.max' => 'User Name feild must be less than 255 charachters',
            'email.required' => 'Email feild is required',
            'email.string' => 'Email feild must be string',
            'email.email' => 'Email field must meet the e-mail format requirements',
            'email.unique' => 'This email already has an account',
            'password.required' => 'Password feild is required',
            'password.min' => 'Password field must be at least 8 characters or numbers long',
            'password.confirmed' => 'The password confirmation does not match.',
            // 'password.regex' => 'حقل كلمة المرور يجب أن يحوي أحرف كبيرة وصغيرة وأرقام',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $profileImage = null;

        $request = app('request');
        
        if($request->hasfile('image')){
            
            $upload_image_name = time().'_'.$request->image->getClientOriginalName();
            $request->image->move('uploads/userImage', $upload_image_name);
            $profileImage = 'uploads/userImage/'.$upload_image_name;
            // save in Image Table
            // Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );
        }else{
            
            $profileImage = 'uploads/userImage/1656869576_personalimg.jpg';
    
        }
        
        return User::create([
            'image' => $profileImage ,
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
