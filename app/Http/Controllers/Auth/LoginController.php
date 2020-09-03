<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance And also set last login.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $data = DB::table('users')->where('email' , $request->email)->get();
        session(['last_login'=> $data['0']->last_login,'user_id'=>$data['0']->id]);
        $data = DB::table('users')->where('email' , $request->email)->update(['last_login' => date(now())]);
        $this->middleware('guest')->except('logout');
    }
}
