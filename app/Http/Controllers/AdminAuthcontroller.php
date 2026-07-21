<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAuthRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthcontroller extends Controller
{
    // login admin form
    public function show_form(){
        return view('dashboard.pages.login');

    }

    // login admin check
    public function check_login(AdminAuthRequest $request){

        $adminAuth=$request->except('_token');


        if(Auth::guard('dash')->attempt($adminAuth)){
            return to_route('dash.index');
        }else{

            return to_route('login.admin.form')->withErrors([
                'admin_error'=>'email or password are incorect'
            ])->withInput();
        }

    }
    // logout
    public function logout() {

        Auth::guard('dash')->logout();
        return to_route('dash.index');

    }
}
