<?php

use App\Http\Controllers\Portal;
use Illuminate\Support\Facades\Route;


Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('register', [Portal\Auth\RegisteredController::class, 'create'])->name('register');
    Route::post('register', [Portal\Auth\RegisteredController::class, 'store']);

    Route::get('login', [Portal\Auth\LoginController::class, 'login'])->name('login');
    Route::post('login', [Portal\Auth\LoginController::class, 'authenticate'])->name('authenticate');

    Route::middleware('auth:' . config('siyandi.apps.portal.guard_name'))->group(function(){
        Route::post('logout', [Portal\Auth\LoginController::class, 'logout'])->name('logout');
    });
});

Route::middleware('auth:' . config('siyandi.apps.portal.guard_name'))->group(function(){
    Route::get('/', [Portal\MyAccountController::class, 'index'])->name('dashboard');
    Route::get('my-account', [Portal\MyAccountController::class, 'index'])->name('my-account');
    Route::get('my-account/profile/edit', [Portal\MyAccountController::class, 'profile_edit'])->name('my-account.profile.edit');
    Route::post('my-account/profile/edit', [Portal\MyAccountController::class, 'profile_update'])->name('my-account.profile.update');
    Route::get('my-account/password/edit', [Portal\MyAccountController::class, 'password_edit'])->name('my-account.password.edit');
    Route::post('my-account/password/edit', [Portal\MyAccountController::class, 'password_update'])->name('my-account.password.update');

    Route::prefix('api')->name('api.')->group(function(){
        Route::get('indonesia/{region}/{code}', [Portal\Api\IndonesiaController::class, 'show'])->name('indonesia.region.show');
        Route::get('indonesia/{region}', [Portal\Api\IndonesiaController::class, 'index'])->name('indonesia.region.index');
    });

    Route::resource('yellow-cards', Portal\YellowCardController::class);
    Route::resource('yellow-cards', Portal\YellowCardController::class);
});