<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('items', 'ItemController@index');
Route::get('items/{item}', 'ItemController@show');
Route::post('items', 'ItemController@store');
Route::put('items/{item}', 'ItemController@update');
Route::delete('items/{item}', 'ItemController@delete');
Route::post('barangku', [QuestionController::class, 'addQuestion']);

// Route::post('login', [AccessTokenController::class, 'issueToken'])
//     ->middleware([
//         'api-login', 'throttle'
//     ]);
// Route::post('login', [AuthController::class,'login']);
