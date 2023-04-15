<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\WorkflowController;
use App\Http\Controllers\Community\PasswordController;

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

Route::post('/register', [RegisterController::class, 'index']);
Route::post('/login', [LoginController::class, 'index']);
Route::post('/set-password/{uid}', [PasswordController::class, 'setPassword']);

Route::get('/countries', [CountryController::class, 'index']);

// Workflow actions
Route::group(['prefix' => 'workflow'], function () {
    // Route::get('/{community_country_id}/list', [WorkflowController::class, 'index']);
    // Route::post('/', [WorkflowController::class, 'store']);
    // Route::delete('/{community_country_id}/{workflow_id}/delete', [WorkflowController::class, 'deleteWorkFlow']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LogoutController::class, 'index']);
});
