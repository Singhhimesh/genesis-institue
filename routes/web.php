<?php

use App\Http\Controllers\Admin\CourseConroller;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CourseController as FrontCourseConroller;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrollController as AdminEnrollController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\EnrollController;
use Illuminate\Support\Facades\Route;

Illuminate\Support\Facades\Auth::routes();

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
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseConroller::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('settings', SettingController::class)->only('create', 'store');
    Route::resource('enrolls', AdminEnrollController::class);
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('courses', [FrontCourseConroller::class, 'index'])->name('courses');
    Route::get('course/{id}/view', [FrontCourseConroller::class, 'show'])->name('courses.details');
    Route::post('enroll/{course_id}', [EnrollController::class, 'store'])->name('enroll');
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
});


