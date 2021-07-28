<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers', 'middleware' => ['api', 'auth:api']], function () {

    Route::put('/url/create', 'UrlController@create');
    Route::get('/url/getOrigin', 'UrlController@getOriginUrl');
    Route::get('/url/getAll', 'UrlController@getAll');
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'v1'
], function ($router) {
    Route::post('/user/login', [AuthController::class, 'login']);
    Route::post('/user/register', [AuthController::class, 'register']);
    Route::post('/user/logout', [AuthController::class, 'logout']);
    Route::post('/user/refresh', [AuthController::class, 'refresh']);
    Route::post('/user/me', [AuthController::class, 'me']);
});
