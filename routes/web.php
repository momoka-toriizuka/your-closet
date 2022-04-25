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
// アイテム登録フォーム
Route::get('/create-item', [App\Http\Controllers\ItemController::class, 'createForm'])->name('/create-item');
// アイテム登録
Route::post('/create-item', [App\Http\Controllers\ItemController::class, 'store'])->name('/create-item');
// アイテム削除
Route::delete('/delete-item/{item_id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('/delete-item/{item_id}');
// アイテム詳細
Route::get('/item-detail/{item_id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('/item-detail/{item_id}');

/**
 * タグ
 */
// タグ一覧
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('/tags');
// タグ登録
Route::post('/create-tag', [App\Http\Controllers\TagController::class, 'store'])->name('/create-tag');
// タグ削除
Route::delete('/delete-tag/{tag_id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('/delete-tag/{tag_id}');
// タグ編集フォーム
Route::get('/update-tag-form/{tag_id}', [App\Http\Controllers\TagController::class, 'updateForm'])->name('/update-tag-form/{tag_id}');
// タグ編集
Route::post('/update-tag/{tag_id}', [App\Http\Controllers\TagController::class, 'update'])->name('/update-tag/{tag_id}');
// // タグごとのアイテム一覧
Route::get('/items-of-tag/{tag_id}', [App\Http\Controllers\TagController::class, 'itemOfTag'])->name('/tag{tag_id}');