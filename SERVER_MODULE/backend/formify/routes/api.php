<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('v1/auth/logout', [AuthController::class, 'logout']);
    Route::post('v1/forms', [FormController::class, 'createForm']);
    Route::get('v1/forms', [FormController::class, 'getAllForms']);
    Route::get('v1/forms/{slug}', [FormController::class, 'getFormDetail']);
    Route::post('v1/forms/{slug}/questions', [FormController::class, 'createQuestions']);
    Route::delete('v1/forms/{slug}/questions/{id}', [FormController::class, 'removeQuestion']);
    Route::post('v1/forms/{slug}/responses', [FormController::class, 'createResponse']);
});

Route::post('v1/auth/login', [AuthController::class, 'login']);
