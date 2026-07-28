<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Models\cat;
use App\Models\product;
use App\Models\image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $product->load(['cat' , 'images']);
        // return response()->json($product);
        $cats = cat::all();
        return view('dashboard.pages.product.edit' , compact('product' , 'cats'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        // return $request ;
        // dd($request->file('img'));

        $newDataP=$request->except('_token' , '_method');

        if($request->hasfile('img')){

            foreach ($request->file('img') as $file) {
                $path=$file->store('product_image' , 'public');

                $product->images()->create([
                  'name' => $path ,
                ]);
            }
        }

        $product->update($newDataP);
        return to_route('product.index');
        // return response()->json([
        //     'success' => true,
        //     'message' => 'success update',
        // ]);


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

    public function deleteImage($id){
        $image=image::findOrfail($id);

        if(Storage::disk('public')->exists($image->name)){
            Storage::disk('public')->delete($image->name);
        }

        $image->delete();
        return to_route('product.index');
    }
}
