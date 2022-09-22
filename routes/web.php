<?php

use App\Http\Controllers\AanmeldController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


// Route voor dashboard + events
Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::group(['prefix'=> '/event'], function(){
        Route::get('/{id}', [EventController::class, 'show'])->name('event.show')->whereNumber('id');
    });
    Route::get('/', [DashboardController::class, 'index'])->name('welcome');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Route voor contacten overzicht
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');

// Route voor settingspagina
Route::get('/settings', function () { return view('settings'); })->name('settings');

// Route voor aanmeldings email
Route::get('aanmelden', function () { return view('aanmelden'); })->name('aanmelden.index');
// Test email versturen voor aanmelding
Route::get('send-mail', [App\Http\Controllers\TestController::class, 'mailSend']);

// Route voor aanmelding data opslaan + bedankt pagina

Route::get('/aanmeldenResult', [\App\Http\Controllers\AanmeldController::class, 'show'])->name('aanmelden.show');
// Route voor resultatenpagina van aanmeldingen
Route::post('/aanmeldenEnd', [\App\Http\Controllers\AanmeldController::class, 'getData'])->name('aanmelden.end');


require __DIR__ . '/auth.php';
