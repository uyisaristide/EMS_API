<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $field=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user=User::create([
            'name'=>$field['name'],
            'email'=>$field['email'],
            'password'=>bcrypt($field['password'])
        ]);

        $token=$user->createToken('myAppToken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];
        return response($response,201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message'=>'Successfully Loged Out'
        ];
    }

    public function login(Request $request){
        $field=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $user=User::where(['email'=>$field['email']])->first();

        if(!$user || !Hash::check($field['password'],$user->password)){
            return ['message'=>'bad credentials'];
        }
        
        $token=$user->createToken('myAppToken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);

    }
}
