<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backnend\UserController;
use App\Http\Controllers\backnend\BlogController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


Route::middleware(['auth', 'typezero'])->group(function () {

    Route::get('/admin/home', [\App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');

    Route::resource('user', UserController::class);
    Route::resource('blog', \App\Http\Controllers\backnend\BlogController::class);
    Route::get('changeStatusBlog', [BlogController::class, 'changeStatusBlog'])->name('changeStatusBlog');
    Route::get('category-recycles', [BlogController::class, 'recycle'])->name('blog.recycle');
    Route::post('restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
    Route::delete('permanent/delete/{id}', [BlogController::class, 'forceDelete'])->name('blog.forceDelete');
    Route::get('/notifications/read/{notification}', [UserController::class, 'markNotificationAsRead'])->name('notifications.read');

});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('single/{id}', [\App\Http\Controllers\FrontBaseController::class, 'single'])->name('single');



