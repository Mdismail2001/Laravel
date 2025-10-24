<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/');
});


Route::get('/about', function () {
    return view('about');
});
