<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        date_default_timezone_set('Asia/Kolkata');
        $users = DB::select('select * from users where id='.Auth::id());
        return view('home' , compact('users'));
    }

    /**
     * Use for logout current session.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
