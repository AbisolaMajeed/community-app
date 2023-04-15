<?php

use App\Http\Controllers\Admin\CountryController;
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

Route::group(['prefix' => 'country'], function () {
    Route::post('/', [CountryController::class, 'store']);
    Route::delete('/{country_id}', [CountryController::class, 'delete']);
});
