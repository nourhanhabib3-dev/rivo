<?php

namespace App\Http\Controllers;

use App\Models\cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catData = Cat::latest()->paginate(5);
        return view('dashboard.pages.category.view' , compact('catData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|string|unique:cats,name|"
        ]);

        cat::create($request->except('_token'));

        return to_route('cat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(cat $cat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cat $cat)
    {
        return view('dashboard.pages.category.edit' , compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cat $cat)
    {
        $newCat = $request->except('_token' , 'method' );
        $cat->update($newCat);

        return to_route('cat.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cat $cat)
    {
        $cat->delete();
        // return to_route('cat.index');
        return response()->json([
            "success"=> true ,
            "mesage"=>"successfully"

        ]);
    }
}
