<?php

use App\Http\Controllers\AanmeldController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;    
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\DB;


// Route voor dashboard + events
Route::group(['middleware'=>['auth', 'verified']], function(){
    Route::group(['prefix'=> '/event'], function(){
        Route::get('/{id}', [EventController::class, 'show'])->name('event.show')->whereNumber('id');
    Route::get('/', [DashboardController::class, 'index'])->name('welcome');
    });
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

// Route::group(['middleware' => ['guest']], function() {

// });

Route::group(['middleware' => ['permission']], function() {
    Route::group(['prefix' => 'users'], function() {

    });

    Route::resource('roles', RolesController::class);
    Route::resource('permissions', PermissionsController::class);
});


// Route::group(['namespace' => 'App\Http\Controllers'], function()
// {
//     /**
//      * Home Routes
//      */
//     Route::get('/', 'HomeController@index')->name('home.index');

//     Route::group(['middleware' => ['guest']], function() {
//         /**
//          * Register Routes
//          */
//         Route::get('/register', 'RegisterController@show')->name('register.show');
//         Route::post('/register', 'RegisterController@register')->name('register.perform');

//         /**
//          * Login Routes
//          */
//         Route::get('/login', 'LoginController@show')->name('login.show');
//         Route::post('/login', 'LoginController@login')->name('login.perform');

//     });

//     Route::group(['middleware' => ['auth', 'permission']], function() {
//         /**
//          * Logout Routes
//          */
//         Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

//         /**
//          * User Routes
//          */
//         Route::group(['prefix' => 'users'], function() {
//             Route::get('/', 'UsersController@index')->name('users.index');
//             Route::get('/create', 'UsersController@create')->name('users.create');
//             Route::post('/create', 'UsersController@store')->name('users.store');
//             Route::get('/{user}/show', 'UsersController@show')->name('users.show');
//             Route::get('/{user}/edit', 'UsersController@edit')->name('users.edit');
//             Route::patch('/{user}/update', 'UsersController@update')->name('users.update');
//             Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
//         });

//         /**
//          * User Routes
//          */
//         Route::group(['prefix' => 'posts'], function() {
//             Route::get('/', 'PostsController@index')->name('posts.index');
//             Route::get('/create', 'PostsController@create')->name('posts.create');
//             Route::post('/create', 'PostsController@store')->name('posts.store');
//             Route::get('/{post}/show', 'PostsController@show')->name('posts.show');
//             Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
//             Route::patch('/{post}/update', 'PostsController@update')->name('posts.update');
//             Route::delete('/{post}/delete', 'PostsController@destroy')->name('posts.destroy');
//         });

//         Route::resource('roles', RolesController::class);
//         Route::resource('permissions', PermissionsController::class);
//     });
// });
