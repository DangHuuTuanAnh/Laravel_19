<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->orderby('updated_at','desc')->simplePaginate(5);

        // $users = User::paginate(15);
        // $users = User::simplePaginate(15);     
        return view('backend.categories.index')->with([
                'categories'=>$categories
        ]);
    }
}
