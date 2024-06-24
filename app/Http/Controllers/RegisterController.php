<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request){

        $rules=array(
         'email' => 'required|unique:users'
        ,'name'=>'required'
        );
        $validate=Validator::make($request->all(),$rules);
        if($validate->fails()){


    return response()->json(['statusCode' => 400, 'message'=> "thisemail already register here", ] , 200);

     }else{
        $users = new User();
        $users->name = $request->name;
        $users->email=$request->email;
        $users->password = Hash::make($request->password);
        
        $users->save();

if ($users != null) {

        return response()->json(['statusCode' => 200, 'message' => 'Register successfully', 'data' => $users], 200);
    }

    return response()->json(['statusCode' => 400, 'message' => 'Please check your data!','data'=>(object) []], 200);
    }}

}
