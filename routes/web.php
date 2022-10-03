<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AanmeldController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UsersController;

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

    // Route voor aanmeldings email
    // Route voor aanmelding data opslaan + bedankt pagina
    // Route voor resultatenpagina van aanmeldingen
    Route::group(['prefix'=> '/aanmelden'], function(){
        Route::get('/', function () { return view('aanmelden'); })->name('aanmelden.index');
        Route::get('/result', [AanmeldController::class, 'show'])->name('aanmelden.show');
        Route::post('/end', [AanmeldController::class, 'getData'])->name('aanmelden.end');
    });

    // Test email versturen voor aanmelding
    Route::group(['prefix'=> '/tests'], function(){
        Route::get('/send-mail', [TestController::class, 'mailSend'])->name('tests.send-mail');
    });

    Route::get('/', [DashboardController::class, 'index'])->name('welcome');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback([FallbackController::class, 'fallback2']);
});

Route::group(['middleware' => ['guest']], function() {
    Route::fallback([FallbackController::class, 'fallback1']);
    Route::get('/', function () {
        return view('auth/login');
    });
});

// Route voor rollensysteem
Route::group(['middleware' => ['permission']], function() {
    Route::group(['prefix' => 'users'], function() {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        // Route::get('/create', [UsersController::class, 'create'])->name('users.create');
        // Route::post('/create', [UsersController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show')->whereNumber('user');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit')->whereNumber('user');
        Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update')->whereNumber('user');
        // Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy')->whereNumber('user');
    });

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});

require __DIR__. '/auth.php';
