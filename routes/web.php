<?php

use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Artisan;

// Route voor events
Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::group(['prefix'=> '/event'], function(){
        Route::get('/{id}', [EventController::class, 'show'])->name('event.show')->whereNumber('id');
    });

    // Route voor contacten overzicht
    Route::group(['prefix'=> '/contacts'], function(){
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
    });

    // Route voor settingspagina
    Route::group(['prefix'=> '/settings'], function(){
        Route::get('/', function () { return view('settings'); })->name('settings');
    });

    // Route voor dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('welcome');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback([FallbackController::class, 'fallback2']);
});

// Route voor fallback
Route::group(['middleware' => ['guest']], function() {
    Route::fallback([FallbackController::class, 'fallback1']);
    Route::get('/', function () {
        return view('auth/login');
    });
});

// Route voor rollensysteem
Route::group(['middleware' => ['permission']], function() {
    Route::group(['prefix' => 'users'], function() {

    });

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});

// Mail voor workshophouder inschrijvingen
Route::get('mail/workshophouder', function () {
    Artisan::call('info:day');
});

Route::get('console/mailstudent', function () {
    Artisan::call('info:student');
});

require __DIR__. '/auth.php';