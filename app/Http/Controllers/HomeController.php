<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::User();
        if ($user->role == 0) {
            return view('backend.dashboard');
        }else{
            return view('frontend.home');
        }
        // Auth::id();
        // if (Auth::check()) {
        //     echo 'đã đăng nhập';
        // }else{
        //     echo "chưa đăng nhập";
        // }
        // dd($user->role);
        // return view('backend.dashboard');
    }
}
