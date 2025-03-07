<?php

use App\Http\Controllers\ContactSenatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('contact-senator')->with([
        'senators' => \App\Models\Senator::all()
    ]);
});

Route::post('/contact-senator', ContactSenatorController::class);