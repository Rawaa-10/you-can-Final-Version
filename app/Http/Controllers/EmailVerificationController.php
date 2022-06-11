<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

/**
 * Class EmailVerificationController
 * @package App\Http\Controllers
 */
class EmailVerificationController extends Controller
{

    /**
     * @param Request $request
     * @return string[]
     */
    public function sendverificationemail (Request $request){
        if ($request->user()->hasverifiedemail())
        {
            return[
                'message'=> 'Already Verified'
            ];
        }
        //$code = rand(0,9);
        $request->user()->sendEmailverificationNotification();
        return ['status' , 'Verification link sent'];
    }


    public function verify(EmailVerificationRequest $request){
        ///EmailVerificationRequest this will take care of validating the request's id and hash parameters.
        if ($request->user()->hasverifiedemail())
        {
            return[
                'message'=> 'Email Already Verified'
            ];
        }
        if($request->user()->markEmailAsVerified())
        {
            event(new Verified($request->user()));
            /////this will add date to email verified at in user table
        }
        return [
            'message' => 'Your Email is verified'
        ];
    }
}
