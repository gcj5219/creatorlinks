<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('index');
});

Route::middleware([ 'auth:sanctum', 'verified' ])->get('/dashboard/links',  function () {
    return view('livewire.links.show');
})->name('links');

Route::middleware([ 'auth:sanctum', 'verified' ])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/{user}', function($user) {
    $user_obj = User::where('username', $user)->first();

    return view('livewire.user-page.show', ['user' => $user_obj]);
});
