<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThoughtController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('thoughts', ThoughtController::class);
