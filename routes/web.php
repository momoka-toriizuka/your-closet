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
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
// アイテム登録フォーム
Route::get('/item/create-form', [App\Http\Controllers\ItemController::class, 'create'])->name('item.create');
// アイテム登録
Route::post('/item/create', [App\Http\Controllers\ItemController::class, 'store'])->name('item.store');
// アイテム削除
Route::delete('/item/delete/{item_id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');
// アイテム詳細
Route::get('/item/detail/{item_id}', [App\Http\Controllers\ItemController::class, 'detail'])->name('item.detail');
// アイテム編集フォーム
Route::get('/item/update-form/{item_id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');
// アイテム編集
Route::post('/item/update/{item_id}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');

/**
 * タグ
 */
// タグ一覧
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags');
// タグ登録
Route::post('/tag/create', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');
// タグ削除
Route::delete('/tag/delete/{tag_id}', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');
// タグ編集フォーム
Route::get('/tag/update-form/{tag_id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
// タグ編集
Route::post('/tag/update/{tag_id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
// // タグごとのアイテム一覧
Route::get('/tag/{tag_id}/items', [App\Http\Controllers\TagController::class, 'itemsOfTag'])->name('items-of-tag');