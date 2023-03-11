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

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');
Route::get('/giangvien',[LoginController::class,'showTeacherLoginForm'])->name('giangvien.login-view');
Route::post('/giangvien',[LoginController::class,'teacherLogin'])->name('giangvien.login');

// Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
// Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');
Route::get('/giangvien/register',[RegisterController::class,'showTeacherRegisterForm'])->name('giang-vien.register-view');
Route::post('/giangvien/register',[RegisterController::class,'createTeacher'])->name('giang-vien.register');

// Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/dashboard',function(){
    return view('admin.admin');
})->middleware('auth:admin');

Route::get('/quan-ly/bai-hoc',function(){
    return view('giangvien.bai-hoc.list');
})->middleware('auth:giangvien');
