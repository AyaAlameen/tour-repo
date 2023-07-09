<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->redirectTo = $this->return_prev_page();
        $this->middleware('guest')->except('logout');
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
}
