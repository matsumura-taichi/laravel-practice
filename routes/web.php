<?php

use App\Http\Controllers\TestController;
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

// 文字列のみ
Route::get('/test', function () {
    return 'test';
});

// 必須パラメータ
Route::get('/required_param/{text}', function ($text) {
    return $text . "が表示されます";
});

// 任意パラメータ
Route::get('/optional_param/{text?}', function ($text = "テキスト") {
    return $text . "が表示されます";
});

// controller
Route::get('/', [TestController::class, 'index']);
