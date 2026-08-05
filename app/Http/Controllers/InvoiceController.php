<?php

namespace App\Http\Controllers;

use App\Jobs\SendInvoiceEmailJob;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function sendInvoice(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        SendInvoiceEmailJob::dispatch($request->email);

        return response()->json([
            'message' => 'Invoice email queue successfully'
        ],200);



    }
}