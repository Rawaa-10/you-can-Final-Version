<?php
declare(strict_types=1);

namespace App\Http\Controllers;

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

        $request->validate([
            'email' => 'required|email'
        ]);
        $status = Password::sendResetLink($request->only('email'));
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
//مسؤولا عن التحقق من صحة الطلب الوارد وتحديث كلمة مرور المستخدم في قاعدة البيانات:
        $request->validate([
            'token' => 'required' ,
            'email' => 'required|email' ,
            'password' => ['required' , \Illuminate\Validation\Rules\Password::default()]
        ]);
        $status = Password::reset(
            $request->only('email' , 'password' , 'password-confirmation' , 'token'),
            function ($user) use ($request){
                $user->forceFill([
                    'password' => Hash::make($request->password) ,
                    'remember_token' => Str::random(60)
                ])->save();
                $user()->tokens->delete();
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
