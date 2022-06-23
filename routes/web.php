<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;    

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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');

    $details = [
        'title' => 'Sample Title From Mail',
        'body' => 'This is sample content we have added for this test mail'
    ];

Route::get('aanmelden', function () { return view('aanmelden'); })->name('aanmelden.index');
Route::get('/aanmeldenResult', [\App\Http\Controllers\AanmeldController::class, 'show'])->name('aanmelden.show');
Route::post('/aanmeldenEnd', [\App\Http\Controllers\AanmeldController::class, 'getData'])->name('aanmelden.end');
// Route voor aanmelding data opslaan + bedankt pagina
// Route voor resultatenpagina van aanmeldingen
// Route voor aanmeldings email