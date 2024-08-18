<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('pages.home');
    })->name('home');

    Route::get('/car-list', function () {
        return view('pages.car-list');
    })->name('car-list');

    Route::get('/about-us', function () {
        return view('pages.about-us');
    })->name('about-us');

    Route::get('/contact', function () {
        return view('pages.contact');
    })->name('contact');

    Route::get('/mycar', function () {
        return view('pages.mycar');
    })->name('mycar');
});
