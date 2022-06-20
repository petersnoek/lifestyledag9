<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\EventController::class, 'index'])->name('welcome');

Route::get('/event/{id}', [App\Http\Controllers\EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');

require __DIR__.'/auth.php';

// Test email versturen voor aanmelding
Route::get('send-mail', function () {
    Mail::to('test@gmail.com')->send(new \App\Mail\mailTemplate());

    dd("Email is sent, please check your inbox.");
});

// Route voor aanmeldings email
Route::get('aanmelden', function () { return view('aanmelden'); })->name('aanmelden.index');

// Route voor resultaat van aanmeldingen
Route::get('aanmeldenResult', function () { return view('aanmeldenResult'); })->name('aanmelden.show');
