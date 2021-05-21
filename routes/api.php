<?php

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
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
    return new UserResource(User::find(1));
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
    }
);
