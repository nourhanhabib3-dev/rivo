<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('user' , UserController::class);
Route::post('/send-invoice' , [InvoiceController::class , 'sendInvoice']);


// url          request method     method

// api/user        get             index(all user)
// api/user        post            store(insert)
// api/user/{id}   get             show( show user)
// api/user/{id}   post x put      update
// api/user/{id}   delete          destroy