<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/pihak-terkait', function () {
    return view('pihak-terkait');
});
