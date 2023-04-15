<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Community\LoginController;
use App\Http\Controllers\Community\LogoutController;
use App\Http\Controllers\Community\RegisterController;
use App\Http\Controllers\Community\WorkflowController;
use App\Http\Controllers\Community\CommunityController;
use App\Http\Controllers\Community\CommunityCountryController;
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

Route::get('/', [CommunityController::class, 'index']);
Route::get('/{community_id}', [CommunityController::class, 'getCommunity']);
Route::post('/by-email', [CommunityController::class, 'getCommunityByEmail']);

//Authentication
Route::post('/register', [RegisterController::class, 'index']);
Route::post('/login', [LoginController::class, 'index']);
Route::post('/set-password/{uid}', [PasswordController::class, 'setPassword']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [LogoutController::class, 'index']);

    // Country actions
    Route::group(['prefix' => 'country'], function () {
        Route::get('/list', [CommunityCountryController::class, 'index']);
        Route::post('/', [CommunityCountryController::class, 'addCountryToCommunity']);
        Route::delete('/{country_id}/delete', [CommunityCountryController::class, 'deleteCountry']);
    });

    // Workflow actions
    Route::group(['prefix' => 'workflow'], function () {
        Route::get('/{community_country_id}/list', [WorkflowController::class, 'index']);
        Route::post('/', [WorkflowController::class, 'store']);
        Route::delete('/{community_country_id}/{workflow_id}/delete', [WorkflowController::class, 'deleteWorkFlow']);

        Route::group(['prefix' => 'entries'], function () {
            Route::post('/', [WorkflowController::class, 'addEntries']);
            Route::get('/{community_workflow_id}/list', [WorkflowController::class, 'listEntries']);
            // Route::delete('/{community_workflow_entry_id}/delete', [WorkflowController::class, 'deleteWorkFlowEntry']);
        });
    });
// });
