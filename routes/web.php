<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
// use App\Http\Middleware\FirstMiddleware;

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

// // 文字列のみ
// Route::get('/test', function () {
//     return 'test';
// });

// // 必須パラメータ
// Route::get('/required_param/{text}', function ($text) {
//     return $text . "が表示されます";
// });

// // 任意パラメータ
// Route::get('/optional_param/{text?}', function ($text = "テキスト") {
//     return $text . "が表示されます";
// });

// controller
Route::get('/', [AuthorController::class, 'index']);
Route::get('/add', [AuthorController::class, 'add']);
Route::post('/add', [AuthorController::class, 'create']);
Route::get('/edit', [AuthorController::class, 'edit']);
Route::post('/edit', [AuthorController::class, 'update']);
Route::get('/delete', [AuthorController::class, 'delete']);
Route::post('/delete', [AuthorController::class, 'remove']);
Route::get('/find', [AuthorController::class, 'find']);
Route::post('/find', [AuthorController::class, 'search']);
Route::get('/author/{author}', [AuthorController::class, 'bind']);
// Route::get('/', [TestController::class, 'index']);
// Route::post('/', [TestController::class, 'post']);
// Route::get('/verror', [TestController::class, 'verror']);

Route::prefix('book')->group(function () {
  Route::get('/', [BookController::class, 'index']);
  Route::get('/add', [BookController::class, 'add']);
  Route::post('/add', [BookController::class, 'create']);
});