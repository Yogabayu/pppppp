<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SoftSkillController;
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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('contactme', [ContactController::class, 'contactme'])->name('contactme');
Route::get('reviews', [ReviewController::class, 'index'])->name('reviews');
Route::get('reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/admin', function () {
    return view('admin.login');
})->name('admin-login');

Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::get('a-index', [DashboardController::class, 'index'])->name('a-index');

    //profile
    Route::resource('profile', ProfileController::class);

    //skill
    Route::resource('skill', SkillController::class);

    //education
    Route::resource('education', EducationController::class);

    //experience
    Route::resource('experience', ExperienceController::class);

    //softskill
    // Route::resource('softskill', SoftSkillController::class);

    //project
    Route::resource('project', ProjectController::class);
});
