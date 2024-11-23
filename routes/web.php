<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoContoll;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;



Route::get('/',[HomeController::class, 'index'])->name('home');


Route::get('/article/{id}', [HomeController::class, 'article'])->name('article');
// Route::get('tag',function(){
//     return ('this tag page');
// });
// Route::get('category', function () {
//     return ('this Category page');
// });
// Route::get('blog', function () {
//     return ('this blog page');
// });
//use Controller for find page or business logic
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/tag', [DemoContoll::class, 'tag']);
Route::get('/category', [DemoContoll::class, 'category']);
Route::get('/blog', [DemoContoll::class, 'blog']);


Route::prefix('admin')->name('admin')->middleware('auth')->group(function () {

    Route::get('/category', [CategoryController::class, 'index'])->name('.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('.category.create');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('.category.edit');
    Route::post('/category', [CategoryController::class, 'store'])->name('.category.store');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('.category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('.category.destroy');

    Route::get('/tag', [TagController::class, 'index'])->name('.tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('.tag.create');
    Route::get('/tag/{id}', [TagController::class, 'edit'])->name('.tag.edit');
    Route::post('/tag', [TagController::class, 'store'])->name('.tag.store');
    Route::put('/tag/{id}', [TagController::class, 'update'])->name('.tag.update');
    Route::delete('/tag/{id}', [TagController::class, 'destroy'])->name('.tag.destroy');
    
    Route::get('/post', [postController::class, 'index'])->name('.post.index');
    Route::get('/post/create', [postController::class, 'create'])->name('.post.create');
    Route::get('/post/{id}', [postController::class, 'edit'])->name('.post.edit');
    Route::post('/post', [postController::class, 'store'])->name('.post.store');
    Route::put('/post/{id}', [postController::class, 'update'])->name('.post.update');
    Route::delete('/post/{id}', [postController::class, 'destroy'])->name('.post.destroy');
});




