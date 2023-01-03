<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
/**
 * アイテム
 */
    // アイテム一覧
    Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');

    Route::group(['prefix' => '/item', 'as' => 'item.'], function() {
        // アイテム登録フォーム
        Route::get('create-form', [App\Http\Controllers\ItemController::class, 'create'])->name('create');
        // アイテム登録
        Route::post('create', [App\Http\Controllers\ItemController::class, 'store'])->name('store');
        // アイテム削除
        Route::delete('delete/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('destroy');
        // アイテム詳細
        Route::get('detail/{item}', [App\Http\Controllers\ItemController::class, 'detail'])->name('detail');
        // アイテム編集フォーム
        Route::get('update-form/{item}', [App\Http\Controllers\ItemController::class, 'edit'])->name('edit');
        // アイテム編集
        Route::post('update/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('update');
    });

/**
 * タグ
 */
    // タグ一覧
    Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags');
    // // タグごとのアイテム一覧
    Route::get('/tag/{tag}/items', [App\Http\Controllers\TagController::class, 'itemsOfTag'])->name('items-of-tag');

        Route::group(['prefix' => '/tag', 'as' => 'tag.'], function() {
        // タグ登録
        Route::post('create', [App\Http\Controllers\TagController::class, 'store'])->name('store');
        // タグ削除
        Route::delete('delete/{tag}', [App\Http\Controllers\TagController::class, 'destroy'])->name('destroy');
        // タグ編集フォーム
        Route::get('update-form/{tag}', [App\Http\Controllers\TagController::class, 'edit'])->name('edit');
        // タグ編集
        Route::post('update/{tag}', [App\Http\Controllers\TagController::class, 'update'])->name('update');
    });

/**
 * コーディネート
 */
    //  コーディネート一覧
    Route::get('/outfits', [App\Http\Controllers\OutfitController::class, 'index'])->name('outfits');

    Route::group(['prefix' => '/outfit', 'as' => 'outfit.'], function() {
        // アイテム登録フォーム
        Route::get('create-form', [App\Http\Controllers\OutfitController::class, 'create'])->name('create');
        // アイテム登録
        Route::post('create', [App\Http\Controllers\OutfitController::class, 'store'])->name('store');
    });
});