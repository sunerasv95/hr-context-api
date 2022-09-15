<?php

use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ChallengesController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::prefix('attendences')->group(function () {
    Route::get('{empCode}', [AttendenceController::class, "employeeAttendence"]);
    
    Route::post('uploads', [AttendenceController::class, "uploadAttendence"]);
});


Route::get('challengeTwo/{inputN}', [ChallengesController::class, "challengeTwo"]);

Route::get('challengeFour', [ChallengesController::class, "challengeFour"]);

