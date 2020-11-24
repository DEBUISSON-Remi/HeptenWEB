<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages/welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',function() {
    return view('pages/welcome');
})->name('accueil');

Route::get('/devis',function() {
    return view('pages/devis');
})->name('devis');

Route::get('/dossiers',function() {
    return view('pages/dossiers');
})->name('dossiers');

Route::get('/chiffre',function() {
    return view('pages/chiffre');
})->name('chiffre');

Route::get('/client',function() {
    return view('pages/clients');
})->name('client');

Route::get('/devis/search',function() {
    return view('pages/unDevi');
})->name('unDevi');

Route::get('/demande/search',function() {
    return view('pages/demandeTransport');
})->name('demandeTransport');
