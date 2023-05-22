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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    // 商品画面表示＋検索機能
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    // 商品登録機能
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    // 商品編集機能
    Route::get('/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/edit/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    // 商品削除機能
    Route::post('/delete/{id}', [App\Http\Controllers\ItemController::class, 'delete']);
    // 商品注文画面に遷移
    Route::get('/request/{id}', [App\Http\Controllers\ItemController::class, 'order']);
    // 注文登録(カートに入れる)
    Route::post('/request/{id}', [App\Http\Controllers\ItemController::class, 'request']);
    
    // 注文一覧＋検索機能
    Route::get('/order_history', [App\Http\Controllers\ItemController::class, 'order_history']);
    // 注文削除機能
    Route::post('/order_history/delete/{id}', [App\Http\Controllers\ItemController::class, 'order_delete']);
    // 注文画面から削除し、発注をかける
    Route::get('/end', [App\Http\Controllers\ItemController::class, 'confirm']);
    Route::post('/confirm/{id}', [App\Http\Controllers\ItemController::class, 'confirm']);

    // 発注画面＋検索機能
    Route::get('/end', [App\Http\Controllers\ItemController::class, 'order_confirm']);

});
