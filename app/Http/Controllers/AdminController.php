<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminData=admin::all();
        return view('dashboard.pages.admin.view' , compact('adminData') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pages.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $admin = $request->except('_token');
        $admin['img']= $request->file('img')->store('admin-image' , 'public');
        Admin::create($admin);
        return to_route('admin.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin $admin)
    {
         return view('dashboard.pages.admin.edit' , compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        $newData = $request->except('_token' , 'method');

        if($request->hasFile('img')){
            unlink(storage_path("app/public/$admin->img"));
            $newData['img'] = $request->file('img')->store('admin-image' , 'public');
        }
        $admin->update($newData);
        return to_route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        unlink(storage_path("app/public/$admin->img"));
        $admin->delete();
        return to_route('admin.index');

    }
}