<?php
declare(strict_types=1);
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
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

Route::post('/register' ,[AuthController::class , 'register']);
Route::post('/login' ,[AuthController::class , 'login']);


Route:: group(['middleware' => ['auth:sanctum' , 'verified']] , function () {
    Route::post('/logout' ,[AuthController::class , 'logout']);
    Route::post('/emailVerification' , [EmailVerificationController::class , 'sendverificationemail']);
    Route::get('/verify-email/{id}/{hash}' ,[EmailVerificationController::class ,'verify'] )
        ->name('verification.verify');
});
