<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('/admin', function () {
    return view('admin.login');
})->name('admin-login');

Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function (){
    Route::resource('dashboard',DashboardController::class);
    Route::get('a-index',[DashboardController::class,'index'])->name('a-index');

    //profile
    Route::resource('profile',ProfileController::class);

    //skill
    Route::resource('skill',SkillController::class);
});