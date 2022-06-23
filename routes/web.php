<?php


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


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('send-mail', function () {

    $details = [
        'title' => 'Sample Title From Mail',
        'body' => 'This is sample content we have added for this test mail'
    ];

    Mail::to('test@gmail.com')->send(new \App\Mail\Uitnodiging($details));

    dd("Email is Sent, please check your inbox.");

});

require __DIR__ . '/auth.php';
