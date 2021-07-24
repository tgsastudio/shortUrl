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

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers', 'middleware' => ['api']], function () {

    Route::put('/url/create', 'UrlController@create');
    Route::get('/url/getOrigin', 'UrlController@getOriginUrl');
    Route::get('/url/getAll', 'UrlController@getAll');
    Route::put('/drafts/products/{product}/multi-language-status', 'MultiLanguageFlowController@update')->name('drafts.products.multi-language-status.update');
});
