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
    public function store(StoreProductRequest $request)
    // public function store(Request $request)
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

        $product->name = $name;
        $product->category_id = $category;
        $product->sale_price = $sale_price;
        $product->origin_price = $origin_price;
        $product->content = $content;
        $product->status = $status;

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

        $images = $product->images;
        $image = Image::where('product_id',$id)->limit(1)->get();

        
        return view('backend.products.show')->with([
            'product'=>$product,
            'images'=>$images,
            'image' =>$image
        ]);
        
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
    public function update(StoreProductRequest $request, $id)
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
