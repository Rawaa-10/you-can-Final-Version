<?php
declare(strict_types=1);

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as RulesPassword ;
use Illuminate\Validation\ValidationException;

/**
 * Class NewPasswordController
 * @package App\Http\Controllers
 */
class NewPasswordController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @throws ValidationException
     */
    public function sendResetLinkResponse (Request $request){
        //you forgot your password and want to change it
        $request->validate([
            'email' => 'required|email'
        ]);
        $status = Password::sendResetLink
                    ($request->only('email'));
        if ($status == Password::RESET_LINK_SENT){
            return [
                'status' => __($status)
            ];
        }

        throw ValidationException::withMessages
        ([
            'email' => [trans($status)]
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendResetResponse (Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        if ($status == Password::PASSWORD_RESET){

            return response([
                'message' => 'password reset successfully '
            ]);
        }
        return response([
            'message' => __($status)
        ] , 500);
    }
}
