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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * アイテム
 */
// アイテム一覧
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('/items');

/**
 * タグ
 */
// タグ一覧
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('/tags');
// タグ登録
Route::post('/tag', [App\Http\Controllers\TagController::class, 'store'])->name('/tag');
// タグ削除
Route::delete('/tag/{tag_id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('/tag/{tag_id}');
// タグ編集フォーム
Route::get('/tag/{tag_id}', [App\Http\Controllers\TagController::class, 'updateform'])->name('/tag/{tag_id}');
// タグ編集
Route::post('/tag/{tag_id}', [App\Http\Controllers\TagController::class, 'update'])->name('/tag/{tag_id}');