<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('man');
})->name('main');

Auth::routes();

Route::prefix('/home')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/edit', [HomeController::class, 'editAction'])->name('editAction');
    Route::get('/edit/{resume}', [HomeController::class, 'edit']);
    Route::post('/insert/portfolio', [HomeController::class, 'insertPortfolio'])->name('insertPortfolio');
    Route::post('/ok/portfolio', [HomeController::class, 'okPortfolio'])->name('okPortfolio');
    Route::post('/create', [HomeController::class, 'createResume'])->name('createResume');
    Route::get('{resume}/messages', [HomeController::class, 'messages']);
});
Route::get('/{resume}', [HomeController::class, 'view']);
Route::get('{resume}/print', [HomeController::class, 'print']);
Route::post('/message', [HomeController::class, 'sendMassage'])->name('sendMassage');
Route::prefix('/blog')->group(function(){
    Route::prefix('/admin')->middleware('auth')->group(function(){
        Route::get('/', [])->name('admin');
        Route::post('/insertPost', [BlogController::class, 'insertPost'])->name('insertPost');
        Route::get('/{resume}', [BlogController::class, 'adminIndex']);
        Route::get('/{resume}/categories', [BlogController::class, 'categories']);
        Route::post('/insertCategory', [BlogController::class, 'insertCategory'])->name('insertCategory');
        Route::get('/deleteCategory/{resume}/{id}', [BlogController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('/EditCategory/{resume}/{id}', [BlogController::class, 'EditCategory'])->name('EditCategory');
        Route::post('/updateCategory', [BlogController::class, 'updateCategory'])->name('updateCategory');
        Route::get('/{resume}/posts', [BlogController::class, 'posts']);
        Route::get('/deletePost/{resume}/{id}', [BlogController::class, 'deletePost'])->name('deletePost');
        Route::get('/EditPost/{resume}/{id}', [BlogController::class, 'EditPost'])->name('EditPost');
        Route::post('/updatePost', [BlogController::class, 'updatePost'])->name('updatePost');
        Route::get('/{resume}/comments', [BlogController::class, 'comments']);
        Route::get('/deleteComment/{resume}/{id}', [BlogController::class, 'deleteComment'])->name('deleteComment');
        Route::get('/statusComment/{resume}/{id}', [BlogController::class, 'statusComment'])->name('statusComment');
    });
    Route::post('/search', [BlogController::class, 'showBySearch'])->name('search');
    Route::post('/insertComment', [BlogController::class, 'insertComment'])->middleware('auth')->name('insertComment');
    Route::get('/{resume}', [BlogController::class, 'home']);
    Route::get('/{resume}/{post}', [BlogController::class, 'viewPost']);
    Route::get('/{resume}/category/{id}', [BlogController::class, 'showByCategory']);
});