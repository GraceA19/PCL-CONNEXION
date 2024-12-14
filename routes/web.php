<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;



Route::get('/', function () {
    return view('login');
});

Route::get('/login',[Controller::class,'login'])->name('login');