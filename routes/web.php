<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\EnlistmentController;
use Illuminate\Support\Facades\Artisan;

// ------------ nieuwe route met permission aanmaken -----------------
// 1. maak een route en stop deze in Route group met middleware permission
// 2. ga naar Roleseeder en voeg de route name toe bij de permissions van elke rol die de route moet kunnen volgen
// 3. voer de command php artisan migrate:fresh --seed uit om het in de database te zetten
// 4. log in met een account met de admin role en check of de route beschikbaar is
// 5. log in met een account waarbij de role geen toestemming moet hebben en check of de route beschikbaar is

// ------------ nieuwe route zonder inloggen aanmaken -----------------
// 1. maak een route en stop deze in Route group met middleware guest
// 2. check of de route beschikbaar is zonder in te loggen


// ------------ nieuwe route die alle gebruikers kunnen bezoeken aanmaken -----------------
// 1. maak een route en stop deze in Route group met middleware auth
// 2. log in met een account en check of de route beschikbaar is
// 3. check of de route beschikbaar is zonder in te loggen

// Route voor rollensysteem
Route::group(['middleware' => ['permission']], function() {
    // Route voor contacten overzicht
    Route::group(['prefix'=> '/contacts'], function(){
        Route::get('/', [ContactController::class, 'index'])->name('contacts.index');
        Route::patch('/generate-users', [ContactController::class, 'generate_users'])->name('contacts.generate-users');
    });

    Route::group(['prefix' => '/users'], function() {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show')->whereNumber('user');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit')->whereNumber('user');
        Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update')->whereNumber('user');
    });

    // Route voor de activity
    Route::group(['prefix' => '/activity'], function() {
        Route::get('/event/{event_id}', [ActivityController::class, 'index'])->name('activity.index');
        Route::get('/create', [ActivityController::class, 'create'])->name('activity.create');
        Route::post('/store', [ActivityController::class, 'store'])->name('activity.store');

        // Edit functie werkt nog niet.
        Route::post('/edit', [ActivityController::class, 'edit'])->name('activity.edit');
    });

    // Route voor het event
    Route::group(['prefix' => '/event'], function() {
        Route::get('/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/store', [EventController::class, 'store'])->name('event.store');

        Route::get('/round/{event_id}', [EventController::class, 'round'])->name('event.round');
        Route::post('/store/round', [EventController::class, 'storeRound'])->name('event.storeRound');
        Route::post('/store/row', [EventController::class, 'storeRow'])->name('event.storeRow');
    });

    Route::group(['prefix' => '/enlistment'], function() {
        Route::post('/store', [EnlistmentController::class, 'store'])->name('enlistment.store');
        Route::post('/destroy', [EnlistmentController::class, 'destroy'])->name('enlistment.destroy');
    });

    // Route voor dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback([FallbackController::class, 'fallback2']);

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);

    // Route voor settingspagina
    Route::group(['prefix'=> '/settings'], function(){
        Route::get('/', function () { return view('settings'); })->name('settings');
    });
});

// Route voor fallback
Route::group(['middleware' => ['guest']], function() {
    Route::fallback([FallbackController::class, 'fallback1']);
    Route::get('/', function(){return redirect()->route('login');});
});

// Migrate en seed de database zonder console. na gebruik uitzetten met comments
// Route::get('migrate', function () {
//     Artisan::call('migrate:fresh');
//     Artisan::call('db:seed');
// });


// Mail voor workshophouder inschrijvingen
Route::get('mail/workshophouder', function () {
    Artisan::call('info:day');
});

// Mail voor student inschrijvingen
Route::get('console/mailstudent', function () {
    Artisan::call('info:student');
});


require __DIR__. '/auth.php';
