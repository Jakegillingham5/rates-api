<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TopicController;
use App\Http\Resources\UserResource;

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

Route::get('/health', function (Request $request) {
    return response()->json(['status' => 'okay']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::group(
    [
        'middleware' => 'auth:sanctum'
    ],
    function () {
        Route::get('/user', function (Request $request) {
            return new UserResource($request->user());
        });

        Route::get(
            '/topic/{topic}',
            [TopicController::class, 'show']
        );

        Route::post(
            '/feedback/create',
            [FeedbackController::class, 'create']
        );

        Route::get(
            '/feedback/{feedback}',
            [FeedbackController::class, 'show']
        );
    }
);
