<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DataController;
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

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/create', [DataController::class, 'create']);
    Route::post('/update/{dataN}', [DataController::class, 'update']);
    Route::post('/delete/{data}', [DataController::class, 'destroy']);
    Route::get('/all', [DataController::class, 'index']);
});

Route::post('/login', [AuthController::class, 'login']);