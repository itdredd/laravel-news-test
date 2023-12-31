<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);

});

Route::post('/news', [\App\Http\Controllers\NewsController::class, 'create'])->middleware('auth');
Route::get('/news', [\App\Http\Controllers\NewsController::class, 'list']);
Route::put('/news/{news}', [\App\Http\Controllers\NewsController::class, 'update'])
    ->whereNumber('news')
    ->middleware('auth');
Route::delete('/news/{news}', [\App\Http\Controllers\NewsController::class, 'delete'])
    ->whereNumber('news')
    ->middleware('auth');
