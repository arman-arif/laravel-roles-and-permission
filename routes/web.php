<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();


Route::group(['middleware'=>'auth'], function ()
{
    Route::get('/dashboard', [HomeController::class, 'dash'])->name('dash');


    // post routes
    Route::get('posts', [PostController::class, 'index'])->name('post.index');
    Route::group(['prefix'=>'post','middleware'=>'auth'],function () {
        Route::get('create', [PostController::class, 'create'])->name('post.create');
        Route::post('store', [PostController::class, 'store'])->name('post.store');
        Route::get('{id}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('{id}/update', [PostController::class, 'update'])->name('post.update');
        Route::delete('{id}/delete', [PostController::class, 'delete'])->name('post.delete');
        Route::get('{id}/show', [PostController::class, 'show'])->name('post.show');
        Route::get('{id}/like', [PostController::class, 'like'])->name('post.like');
    });

    // category routes
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
    Route::group(['prefix'=>'category','middleware'=>'auth'], function () {
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('{id}/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
    });

    Route::get('tags', [TagController::class, 'index'])->name('tag.index');
    Route::group(['prefix'=>'tag','middleware'=>'auth'], function () {
        Route::get('create', [TagController::class, 'create'])->name('tag.create');
        Route::post('store', [TagController::class, 'store'])->name('tag.store');
        Route::delete('delete', [TagController::class, 'delete'])->name('tag.delete');
    });

    Route::get('roles', [RoleController::class, 'index'])->name('role.index');
    Route::prefix('role')->group(function () {
        Route::post('store', [RoleController::class, 'store'])->name('role.store');
        Route::delete('delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    });

    Route::get('permissions', [PermissionController::class, 'index'])->name('permission.index');
    Route::prefix('permission')->group(function () {
        Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
        Route::delete('delete/{id}', [PermissionController::class, 'delete'])->name('permission.delete');

        Route::get('to/role', [PermissionController::class, 'getRolePermission'])->name('permission.to-role');
    });


});
