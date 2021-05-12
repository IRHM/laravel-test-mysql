<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\DB;

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        $data = DB::table('FCSTMR_Type')->select('id', 'type', 'NAME', 'magento_id')->get();

        return view('data')->with('data', $data);
    })->name("data");

    Route::delete('/data/delete/{id}', [DataController::class, 'delete'])->name('data.delete');
    Route::post('/data/create', [DataController::class, 'create'])->name('data.create');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login');
