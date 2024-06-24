<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function login(Request $request)
    {

        $rules=array(  'email'          => 'required',
        'password'            => 'required',
       );
        $validate=Validator::make($request->all(),$rules);
        if($validate->fails()){

            return response()->json(['statusCode' => 400, 'message' => 'please fill the required fields.','data'=>(object) []], 200);


     }else{
        $user = User::where('email', $request->email)->first();
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password
        ];
        if(auth()->attempt($credentials)) {

                $token = $user->createToken('my-app-token')->plainTextToken;
                $user['token'] = $token;
                return response()->json(['statusCode' => 200, 'message' => 'login successfully', 'data' => $user], 200);


        } else {
            return response()->json(['statusCode' => 400, 'message' => 'Credential are not correct', 'data' => (object) []], 200);
        }
    }}
}
