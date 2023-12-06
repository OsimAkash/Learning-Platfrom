<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LessonController;

use App\Http\Controllers\CourseController as FrontendCourseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController as FortendLessonController;

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
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [FrontendCourseController::class, 'index'])->name('courses');
Route::get('/courses/{course}', [FrontendCourseController::class, 'show'])->name('courses.details');
Route::get('/lessons/{lesson}/{slug?}', [FortendLessonController::class, 'show'])->name('lessons.details');
Route::get('about', [AboutController::class, 'show'])->name('about');

Route::get('login', [AuthController::class, 'login_form'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {



    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class)->except([
        'show', 'edit', 'update'
    ]);
    Route::resource('courses', CourseController::class);
    Route::resource('lessons', LessonController::class);
});
