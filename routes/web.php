<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
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
    return view('home');
})->name('home');

Route::get('/login',function (){
    if(\Illuminate\Support\Facades\Auth::check()){
        return redirect(\route('home'));
    }
    return view('login');
})->name('login');

Route::post('/login',[LoginController::class,'login']);

Route::get('/logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/registration',function (){
    if(\Illuminate\Support\Facades\Auth::check()){
        return redirect(\route('home'));
    }
    return view('registration');
})->name('registration');

Route::post('/registration',[RegisterController::class,'save']);

Route::get('files', [FileController::class, 'index'])->name('file.index');
Route::post('files', [FileController::class, 'store'])->name('file.store');
Route::get('files/delete/{id}', [FileController::class, 'destroy'])->name('file.destroy');
