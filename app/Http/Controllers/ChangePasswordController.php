<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * @param Request $request
     */
    public function changepassword (Request $request) {
        //dd($request->all());
        $request->validate([
            'password' => 'required' ,
            'new-password'=> 'required|min:8' ,
            'confirm_password' => 'required|same:new-password'
        ] , [
            'password.required' =>'YOU HAVE TO ENTER YOUR OLD PASSWORD TO CHANGE IT ' ,
            'new-password.required' =>'YOU HAVE TO ENTER THE NEW PASSWORD TO CHANGE THE OLD ONE  '
        ]);
        ///get user old password
        $user = Auth::user();
        ///check if old password is the user password
        if (Hash::check($request['password'] ,$user->password ))
        {
           $user->fill([
               'password' => Hash::make($request['new-password'])
           ])->save();
            auth()->user()->Tokens()->delete();
            return response()->json(['message' => 'YOUR PASSWORD SUCCESSFULLY UPDATED !!! '] , 200);
        }else{
            return response()->json(['message' => 'YOUR OLD PASSWORD IS INCORRECT !!! '] , 200);
        }

    }
}


