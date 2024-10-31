<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register(Request $request){

        $fields = $request->validate([
            'name'=>'required|max:18',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $user =  User::create($fields);

        $token = $user->createtoken($request->name);

        return [
            'user'=> $user,
            'token' => $token->plainTextToken          
        ];
    }
    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
            'password'=>'required'
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){

            return [
                'message'=>'The credentials you provided does not match',
            ];
        }

        $token = $user->createtoken($user->name);

        return [
            'user'=> $user,
            'token' => $token->plainTextToken
        ];
    }
    public function logout(Request $request){
       $request->user()->tokens()->delete();

       return[
        'message' => 'You are Logged Out!'
       ];
    }
}
 