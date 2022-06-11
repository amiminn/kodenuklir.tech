<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\SrtLinkController;
use App\Models\Chat;
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

Route::apiResource('srt', SrtLinkController::class)->except([
    'create', 'edit'
]);

Route::apiResource('chat', ChatController::class)->except([
    'create', 'edit', 'show', 'update', 'destroy'
]);

Route::get('chat/reset', [ChatController::class, 'reset']);
