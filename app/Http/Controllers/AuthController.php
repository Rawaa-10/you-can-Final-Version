<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
     public function register(Request $request){
            $request->validate([
                'f-name' => 'required|string',
                'l-name' => 'required|string',
                'email' => 'required|email|unique:Users,email',
                'password'=> 'required|min:8' ,
                'confirm_password' => 'required|same:password'
            ] , [
                'f-name.required' => 'THE FIRST NAME IS REQUIRED ',
                'l-name.required' => 'THE LAST NAME IS REQUIRED' ,
                'email.required' =>'THE EMAIL IS REQUIRED' ,
                'password.required' =>'THE PASSWORD IS REQUIRED' ,
            ]);

            $users = User::create([
                'f-name' => $request['f-name'] ,
                'l-name' => $request['l-name'] ,
                'email'=> $request['email'] ,
                'password'=> bcrypt($request['password'])
            ]);

        $token = $users->createtoken('myapptoken')->plainTextToken;

        $respone = [
            'user' => $users ,
            'token' => $token
        ];

        return response($respone , 201);
    }

    /**
     * @param Request $request
     * @return string[]
     */
    public function logout (Request $request){
        auth()->user()->Tokens()->delete();
        return [
            'message' => 'logged out'
        ];

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function login (Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=> 'required|min:8'
        ] , [
            'email.required' =>'THE EMAIL IS REQUIRED' ,
            'password.required' =>'THE PASSWORD IS REQUIRED' ,
        ]);
        //check email
        $users = User::where('email' , $request['email'])->first();

        //check password
        if (!$users || !Hash::check($request['password'] , $users->password))
        {
            return response(['message' => 'bad log in '] , 401);
        }
        $token = $users->createtoken('myapptoken')->plainTextToken;

        $respone = [
            'user' => $users ,
            'token' => $token
        ];

        return response($respone , 201);
    }
}
