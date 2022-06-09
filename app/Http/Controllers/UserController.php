<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function  getprofile (Request $request) {
        try {
            $users = User::find($request->user()->id);
            return response()->json([ 'status ' => 'true' , 'message' => 'user profile'
                , 'data' =>$users]);

        }catch(\Exception $exception){
        return response()->json([ 'status ' => 'false' , 'message' => $exception->getMessage()
        , 'data' => []] , 500);
        }
    }

    /**
     * @param Request $request
     */
    public function updateprofile (Request $request){
         $user_id = Auth::user()->id;
         $user = User::find($user_id);
         $user['f-name'] = $request->input('f-name');
        $user['l-name'] = $request->input('l-name');
        $user['phone'] = $request->input('phone');
        $user['education'] = $request->input('education');
        $user['address'] = $request->input('address');
        $user['birth-date'] = $request->input('birth-date');

         if ($request->hasFile('picture')){
             ///store new picture in folder
             $image = $request['picture']->store('images' , 'public');
             ////delete old picture
             Storage::disk('public')->delete($user['picture']);
             $user['picture'] = $image;
         }
         $user->update();
         return response()->json([ 'status ' => 'true' , 'message' => 'profile updated !!!!'
             , 'data' =>$user]);
    }

}
