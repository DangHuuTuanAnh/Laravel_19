<?php

namespace App\Http\Controllers\Backend;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')->orderby('updated_at','desc')->simplePaginate(5);
        return view('backend.products.index')->with([
            'products'=>$products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('backend.products.create')->with([
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreProductRequest $request)
    public function store(Request $request)
    {


        //Cách 1:
        // $validatedData = $request->validate([
        //     'name'         => 'required|min:8|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ]);

        //Cách 2:
        // $validatedData = $request->validate([
        //     'name'=>['required','min:8','max:255'],
        // ]); 

        // $validator = Validator::make($request->all(),
        //     [
        //         'name'         => 'required|min:8|max:255',
        //         'origin_price' => 'required|numeric',
        //         'sale_price'   => 'required|numeric',
        //     ],
        //     [
        //         'required'=>':attribute Không được để trống!',
        //         'min'=>':attribute Không được lớn hơn :min!',
        //         'max'=>':attribute Không được lớn hơn :max!',
        //     ],
        //     [
        //         'name'=>'Tên sản phẩm',
        //         'origin_price'=>'Giá gốc',
        //         'sale_price'=>'Giá bán',
        //     ]
        // );
        // // dd($validator);

        // if($validator->errors()){
        //     return back()->withErrors($validator)->withInput();
        // }

        $product = new Product();
        $name = $request->get('name');
        $category = $request->get('category');
        $sale_price = $request->get('sale_price');
        $origin_price = $request->get('origin_price');
        $content = $request->get('content');
        $status = $request->get('status');

        //Test lưu thông số kỹ thuật:

        // $manufacturer = $request->get('manufacturer');     
        // $size = $request->get('size');     
        // $weight = $request->get('weight');     
        // $ram = $request->get('ram');     
        // $memory = $request->get('memory');     
        // $sim = $request->get('sim');

        // $configs = array(
        //     'manufacturer'=>$manufacturer,
        //     'size'=>$size,
        //     'weight'=>$weight,
        //     'ram'=>$ram,
        //     'memory'=>$memory,
        //     'sim'=>$sim,
        // );     

        // dd(json_encode($configs));

        //End test

        $product->name = $name;
        $product->category_id = $category;
        $product->sale_price = $sale_price;
        $product->origin_price = $origin_price;
        $product->content = $content;
        $product->status = $status;
        // $product->configs = json_encode($configs);

        $product->save();

        if ($request->hasFile('images')){
        //Upload nhiều ảnh:
            $images = $request->file('images');
            foreach ($images as $image){
           // $file = $image->store('image');

           // $url = 'storage/abc/a.png';

           $namefile = $image->getClientOriginalName();//lấy tên file:
           // $path = 'avatar/'.$namefile;
           // $url = $path;
           // dd($path);

           $product_images =Storage::disk('public')->putFileAs('products',$image,$namefile);

           $url = Storage::url($product_images);

            // dd($images);

           // dd($url);

            // // dd($product->id);

           $image = $product->images()->create([
            'name' => $namefile,
            'path' =>$url



        ]);
       }

        //Cách 1:
        // $path = Storage::putFile('images1', $request->file('image'));

        //Cách 2:
        // $file = $request->file('image');
        // Lưu vào trong thư mục storage
        // $path = $file->store('images');
        // $path = $file->store('images1',['disk'=>'public']);
        // dd('co file');
   }else{
    dd('khong co file');
}
return redirect()->route('backend.product.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        $configs = $product->configs;

        $show_configs = json_decode($configs);

        // dd($show_configs);

        $images = $product->images;
        $image = Image::where('product_id',$id)->limit(1)->get();

        
        return view('backend.products.show')->with([
            'product'=>$product,
            'images'=>$images,
            'image' =>$image,
            'show_configs'=>$show_configs,
        ]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    // public function edit(Product $product)
    {
        $user = Auth::user();
        $product = Product::find($id);
        $categories = Category::get();

        if ($user->can('update', $product)) {
            // dd('OK');
           return view('backend.products.edit')->with([
            'categories'=>$categories,
            'product'=>$product,
        ]);
       }else{
            // dd('NO');
        return redirect()->route('backend.product.index');
    }
    
}



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(StoreProductRequest $request, $id)
    public function update(Request $request, $id)
    {

        $categories = Category::get();
        $product = Product::find($id);
        if (Gate::allows('update-product',$product)) {
            // return view('backend.products.edit',['product'=>$product,'categories'=>$categories]);
            // dd('OK');
            $name = $request->get('name');
            $category_id = $request->get('category_id');
            $origin_price = $request->get('origin_price');
            $sale_price= $request->get('sale_price');
            $content = $request->get('content');
            $status = $request->get('status');

            $product->name = $name;
            $product->category_id = $category_id;
            $product->origin_price = $origin_price;
            $product->sale_price = $sale_price;
            $product->content = $content;
            $product->status = $status;

            $product->save();

            return redirect()->route('backend.product.index');
        }else{
            dd('NO');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    public function destroy(Product $product)
    {
        $user = Auth::user();
        $product = Product::find($product);
        if ($user->can('delete',$product)) {
            $product->delete();
            // return redirect()->route('backend.product.index');
            dd('OK');
        }
        else{
            dd('NO');
        }


    }
}
