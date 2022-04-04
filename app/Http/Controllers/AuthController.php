<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'email' => 'required|string|unique:Users,email',
            'password'=> 'required | string |confirmed',
            'phone' => 'required | string |unique:Users,phone' ,
            'birth-date' => 'required|date' ,
            'address'=> 'required|string' ,
            'g-recaptcha-response' => 'recaptcha'
        ]);
        $users = User::create([
            'f-name' => $request['f-name'] ,
            'l-name' => $request['l-name'] ,
            'email'=> $request['email'] ,
            'password'=> bcrypt($request['password']),
            'phone' => $request['phone'] ,
            'birth-date' => $request['birth-date'] ,
            'address' => $request['address']
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
        auth()->user()->tokens->each->delete();
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
            'email' => 'required|string',
            'password'=> 'required'
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
