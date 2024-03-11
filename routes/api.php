<?php

use App\Http\Controllers\student\StudentApiController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/students', [StudentApiController::class, 'index']);
Route::get('/students/{student}', [StudentApiController::class, 'show']);

Route::post('/students', [StudentApiController::class, 'store']);
Route::match(['put', 'patch'], '/students/{student}', [StudentApiController::class, 'update']);

Route::delete('/students/{student}', [StudentApiController::class, 'destroy']);
