<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

    	// $users = DB::table('users')->get();

    	// $users = DB::table('users')->where('name','Ta')->first();

    	

    	// dd($users);
    	return view('frontend.home');
    }
}
