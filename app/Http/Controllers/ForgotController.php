<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use mysql_xdevapi\Exception;

/**
 * Class ForgotController
 * @package App\Http\Controllers
 */
class ForgotController extends Controller
{
    /**
     * @param ForgotRequest $forgotRequest
     */
    public function forgot(ForgotRequest $request){
        $email = $request->input('email');
        if (User::where('email' , $email)->doesntExist()){
            return response([
                'message' => 'email does not exists !!'
            ] , 404);
            $token = Str::random(10);

            try {

                DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => $token
                ]);
                return response([
                    'message' => 'check your email!'
                ]);

            }

            catch (\Exception $exception){
                return response([
                    'message' => $exception->getMessage()
                ] , 400);
            }
        }
    }
}
