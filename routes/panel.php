<?php


use App\Http\Controllers\Panel AS Panel;

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function(){
    Route::get('login', [Panel\Auth\LoginController::class, 'login'])->name('login');
    Route::post('login', [Panel\Auth\LoginController::class, 'authenticate'])->name('authenticate');
});


Route::middleware(['auth:web'])->group(function(){
    Route::get('/', Panel\DashboardController::class)->name('dashboard');

    Route::post('logout', [Panel\Auth\LoginController::class, 'logout'])->name('auth.logout');
    Route::get('my-account', [Panel\MyAccountController::class, 'edit'])->name('my-account.edit');
    Route::post('my-account', [Panel\MyAccountController::class, 'update'])->name('my-account.update');
    Route::post('my-account/password', [Panel\MyAccountController::class, 'change_password'])->name('my-account.password.update');

    Route::prefix('api')->name('api.')->group(function(){
        Route::get('indonesia/{region}/{code}', [Panel\Api\IndonesiaController::class, 'show'])->name('indonesia.region.show');
        Route::get('indonesia/{region}', [Panel\Api\IndonesiaController::class, 'index'])->name('indonesia.region.index');
    });

    Route::resource('provinces', Panel\ProvinceController::class)->except(['show']);
    Route::resource('cities', Panel\CityController::class)->except(['show']);
    Route::resource('districts', Panel\DistrictController::class)->except(['show']);
    Route::resource('villages', Panel\VillageController::class)->except(['show']);
    Route::resource('citizens', Panel\CitizenController::class)->only(['index', 'show']);

    Route::get('post-types/{post_type}/categories/select2', [Panel\PostTypeCategoryController::class, 'select2'])->name('post-types.categories.select2');
    
    Route::resource('post-types.categories', Panel\PostTypeCategoryController::class)->except(['show']);
    Route::resource('post-types.posts', Panel\PostTypePostController::class)->except(['show']);
    Route::resource('post-types', Panel\PostTypeController::class)->except(['show']);
    
    Route::resource('officers', Panel\OfficerController::class)->except(['show']);
    Route::resource('job-vacancy-channels', Panel\JobVacancyChannelController::class)->except(['show']);

});
