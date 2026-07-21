<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Models\cat;
use App\Models\product;
use App\Models\image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productData= product::with(['cat' , 'images'])->get();
        return view('dashboard.pages.product.view' , compact('productData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats=cat::all();
        return view('dashboard.pages.product.create' , compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(productRequest $request)
    {
        // dd($request->file('img'));
        $product= product::create($request->except('_token' , 'img'));
        $product_id=$product->id;

        foreach($request->file('img') as $img){
            $image= $img->store('product-images' , 'public');

            image::create([
                "name" => $image,
                "product_id" => $product_id

            ]);

        }

        return to_route('product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        return view('dashboard.pages.product.edit' );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $oldImg= image::where("product_id" , $product->id)->pluck("name");
        foreach ($oldImg as $key=>$value) {
            unlink(storage_path("app/public/$value"));
        }

        $product->delete();
        return to_route('product.index');
    }
}