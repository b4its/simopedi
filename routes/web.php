<?php

use App\Http\Controllers\Helpers\SendersControllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/pihak-terkait', function () {
    return view('pihak-terkait');
});

Route::post('/trigger-bencana', [SendersControllers::class, 'cekSensor']);
