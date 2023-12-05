<?php

use App\Http\Controllers AS Web;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('web.pages.landing');
});
Route::get('home', function () {
    return view('web.pages.home');
})->name('home');
Route::get('captcha', Web\CaptchaController::class)->name('captcha');
