<?php
declare(strict_types=1);
use App\Http\Controllers\AdvsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\NewPasswordController;
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
//Route::middleware('auth:sanctum' , 'verified')->get('/user' ,
  //  function (Request $request) {
   // return $request->user();
    //});



    Route::get('/register' ,[AuthController::class , 'register']);
    Route::post('/register' ,[AuthController::class , 'register']);
    Route::post('/login' ,[AuthController::class , 'login']);
    Route::post('/logout' ,[AuthController::class , 'logout'])->middleware(['auth:sanctum']);


    Route::post('/emailVerification' , [EmailVerificationController::class , 'sendverificationemail'])
        ->name('verification.notice')->middleware(['auth:sanctum']);;
    Route::get('/verify-email/{id}/{hash}' ,[EmailVerificationController::class ,'verify'] )
        ->name('verification.verify')->middleware(['auth:sanctum']);



    Route::post('/forgot-password' , [NewPasswordController::class , 'sendResetLinkResponse']);
    Route::post('/reset-password' , [NewPasswordController::class , 'sendResetResponse'])->name('reset');


    Route::resource('/create-adv' , AdvsController::class);
    //Route::post('/forgot-password' , [ForgotController::class , 'forgot']);
