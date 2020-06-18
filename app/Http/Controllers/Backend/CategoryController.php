<?php

namespace App\Http\Controllers\Backend;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->orderby('updated_at','desc')->simplePaginate(5);
        return view('backend.categories.index')->with([
                'categories'=>$categories
        ]);
    }
    public function showProducts($category_id){
        $category = Category::find($category_id);
    	$products = $category->products;
         return view('backend.categories.showProducts')->with([
            'category'=>$category, 
            'products'=>$products
         ]);

    }
}
