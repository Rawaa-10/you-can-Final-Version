<?php

declare(strict_types=1);

namespace App\Http\Controllers\api;

use App\Models\TypeAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
                'f-name' => 'required|string|max:12|min:3',
                'l-name' => 'required|string|max:12|min:3',
                'email' => ['required',  'email', 'max:255' , 'min:5'
                 , Rule::unique('users')->whereNull('deleted_at')],
                'password'=> 'required|min:8' ,
                'confirm_password' => 'required|same:password'
            ] , [
                'f-name.required' => 'PLEASE ENTER YOUR FIRST NAME ',
                'l-name.required' => 'PLEASE ENTER YOUR LAST NAME ' ,
                'email.required' =>'PLEASE ENTER YOUR EMAIL ' ,
                'password.required' =>'PLEASE ADD PASSWORD TO YOUR ACCOUNT ' ,
            ]);
       // $account_type = TypeAccount::query()->where("type-act" , "")
             $users = User::create([
                 'f-name' => $request['f-name'],
                 'l-name' => $request['l-name'],
                 'email' => $request['email'],
                 'password' => bcrypt($request['password']),
                 'account_type' => 'normal'
             ]);
                if($users['deleted_at'] === null){
             $token = $users->createtoken('myapptoken')->plainTextToken;

             $respone = [
                 'user' => $users,
                 'token' => $token
             ];

             return response($respone, 201);
             }
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
            'email' => 'required|email|max:255|min:5',
            'password'=> 'required|min:8'
        ] , [
            'email.required' =>'PLEASE ENTER YOUR EMAIL ' ,
            'password.required' =>'PLEASE ENTER YOUR PASSWORD' ,
        ]);

        //check email
        $users = User::query()->where('email' , $request['email'])->first();

        //check password
        if (!$users || !Hash::check($request['password'] , $users->password))
        {
            return response(['message' => 'THERE IS SOMETHING WRONG !!'] , 401);
        }
        if($users['email_verified_at'] === null) {
            return  response()->json(['message' => 'YOU HAVE TO VERIFY YOUR EMAIL FIRST !!! '] , 200);
        }else {
            $token = $users->createtoken('myapptoken')->plainTextToken;
            $respone = [
                'user' => $users,
                'token' => $token
            ];
            return response($respone, 201);
        }
    }
}
