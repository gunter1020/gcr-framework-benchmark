<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/ping', fn (Request $request) => [
    'status' => 'pong',
    'server' => [
        'time' => Carbon::now()->format('Y-m-d H:i:s'),
    ],
    'user' => [
        'ip' => $request->ip(),
        'agent' => $request->userAgent(),
    ],
]);