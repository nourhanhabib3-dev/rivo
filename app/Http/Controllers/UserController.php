<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $UserData= User::all();
        return response()->json($UserData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create($request->except("_token"));
        return response()->json([
            "message" => "success insert"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user= User::find($id);
        if(empty($user)){
            return response()->json([
                "message" => "id not found"
            ]);
        }else{
            return response()->json($user);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where("id" , $id)->update($request->only('name' , 'email'));
        return response()->json([
            "message" => " update the user"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where("id" , $id)->delete();
        return response()->json([
            "message" => " delete the user"
        ]);
    }
}
