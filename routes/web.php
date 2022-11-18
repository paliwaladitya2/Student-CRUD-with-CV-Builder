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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\cvController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HODController;


Route::get('/', [cvController::class, 'index'])->name('index');
Route::get('cv-builder', [cvController::class, 'cv_builder'])->name('cv_builder');
Route::post('cv-generator', [cvController::class, 'cv_generator'])->name('cv_generator');
Route::get('cv/{id}', [cvController::class, 'cv'])->name('cv');
Route::get('about', [cvController::class, 'about'])->name('about');
Route::get('contact', [cvController::class, 'contact'])->name('contact');
Route::get('privacy-policy', [cvController::class, 'privacy_policy'])->name('privacy_policy');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/student/{id}',[StudentController::class,'index'])->name('studenthome');

Route::get('/admin', [HomeController::class, 'admin'])->name('admin');

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function () {
    //hod routes
    Route::get('/hod', [HODController::class , 'index'])->name('admin.hod');
    Route::get('/hod/create', [HODController::class , 'create'])->name('admin.hod.create');
    Route::post('/hod', [HODController::class , 'store'])->name('admin.hod.store');
    Route::get('/hod/{id}/edit', [HODController::class , 'edit'])->name('admin.hod.edit');
    Route::post('/hod/{id}', [HODController::class , 'update'])->name('admin.hod.update');
    Route::delete('/hod/{id}/delete', [HODController::class , 'delete'])->name('admin.hod.delete');
    Route::get('/hod/{id}', [HODController::class , 'view'])->name('admin.hod.view');
    //faculty routes
    Route::get('/faculty', [FacultyController::class , 'index'])->name('admin.faculty');
    Route::get('/faculty/create', [FacultyController::class , 'create'])->name('admin.faculty.create');
    Route::post('/faculty', [FacultyController::class , 'store'])->name('admin.faculty.store');
    Route::get('/faculty/{id}/edit', [FacultyController::class , 'edit'])->name('admin.faculty.edit');
    Route::post('/faculty/{id}', [FacultyController::class , 'update'])->name('admin.faculty.update');
    Route::delete('/faculty/{id}/delete', [FacultyController::class , 'delete'])->name('admin.faculty.delete');
    Route::get('/faculty/{id}', [FacultyController::class , 'view'])->name('admin.faculty.view');
    //student routes
    Route::get('/student', [StudentController::class , 'index'])->name('admin.student');
    Route::get('/student/create', [StudentController::class , 'create'])->name('admin.student.create');
    Route::post('/student', [StudentController::class , 'store'])->name('admin.student.store');
    Route::get('/student/{id}/edit', [StudentController::class , 'edit'])->name('admin.student.edit');
    Route::post('/student/{id}', [StudentController::class , 'update'])->name('admin.student.update');
    Route::delete('/student/{id}/delete', [StudentController::class , 'delete'])->name('admin.student.delete');
    Route::get('/student/{id}', [StudentController::class , 'view'])->name('admin.student.view');
    //user routes
    Route::get('/users', [UserController::class , 'index'])->name('admin.users');
    Route::get('/users/create', [UserController::class , 'create'])->name('admin.users.create');
    Route::post('/users', [UserController::class , 'store'])->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class , 'edit'])->name('admin.users.edit');
    Route::post('/users/{id}', [UserController::class , 'update'])->name('admin.users.update');
    Route::delete('/users/{id}/delete', [UserController::class , 'delete'])->name('admin.users.delete');
    Route::get('/users/{id}', [UserController::class , 'view'])->name('admin.users.view');
});
