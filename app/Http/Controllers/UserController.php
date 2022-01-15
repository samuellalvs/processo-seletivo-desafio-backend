<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;

use App\Models\User;

class UserController extends Controller
{
    public function createUser(Request $request){
        $validated = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|unique:users',
            'registryNumber' => 'string|required|unique:users',
            'type' => 'string|required',
            'password' => 'string|required'
        ]);

        if($validated){
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->registryNumber = $request->registryNumber;
            $user->type = $request->type;
            $user->password = Hash::make($request->password);
            
            if($user->save()){
                return response()->json([
                    'data' => 'success'
                ], 200);
            }else{
                return response()->json([
                    'data' => 'error'
                ], 400);
            }
        }else{
            return response()->json([
                'data' => 'error'
            ], 400);
        }
    }

    public function signIn(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(auth()->attempt($credentials)){
            $user_token = auth()->user()->createToken('@picpay:token')->plainTextToken;

            auth()->user()->bank_balance;

            return response()->json([
                'data' => 'success',
                'user' => auth()->user(),
                'token' => $user_token
            ], 200);
        } else {
          return response()->json([
              'data' => 'failed'
          ], 401);
        }
    }

    public function signOut(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'data' => 'success'
        ], 200);
    }

}
