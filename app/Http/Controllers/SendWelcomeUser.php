<?php

namespace App\Http\Controllers;
use App\Jobs\SendWelcomeEmailJob;

use Illuminate\Http\Request;

class SendWelcomeUser extends Controller
{
    public function register(Request$request){
        SendWelcomeEmailJob::dispatch($request->name , $request->email);

        return response()->json([
            'message'=>'User registered successfully'
        ]);
    }



}
