<?php

use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\ContactUs;
use App\Livewire\Registration;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/contact', ContactUs::class);
Route::get('/login', Login::class);
Route::get('/registration', Registration::class);
Route::get('verify-email/{token}', [Registration::class, 'verifyEmail'])->name('verify-email');
Route::get('/reload-captcha', [Login::class, 'reloadCaptcha'])->name('reload-captcha');
