<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TaiLieuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/checkLogin', 'checkLogin');
    });

});

Route::controller(DanhMucController::class)->prefix('danh-muc')->group(function () {
    Route::get('/create', 'create')->name('danhmuc.create');
    Route::post('/store', 'store')->name('danhmuc.store');
});

Route::controller(TaiLieuController::class)->prefix('tai-lieu')->group(function () {
    Route::get('/create', 'create')->name('tailieu.create');
    Route::post('/store', 'store')->name('tailieu.store');
});
