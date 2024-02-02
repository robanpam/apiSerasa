<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    function Register(Request $R){
        try{
            $cred = new User();
            // $cred->increments('id');
            $cred->name = $R->name;
            $cred->dob = $R->dob;
            $cred->phone = $R->phone;
            $cred->email = $R->email;
            $cred->password = Hash::make($R->password);
            $cred->role = 1;
            $cred->save();
            $response = ['status' => 200, 'message' => 'Register Successfully! Welcome to Serasa'];
            return response()->json($response);
        }catch(Exception $e){
            $response = ['status' => 500, 'message' => $e];
        }
    }

    function Login(Request $R){
        $user=User::where('email', $R->email)->first();

        if($user!='[]' && Hash::check($R->password,$user->password)){
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['status' => 200, 'token' => $token, 'user' => $user, 'message' => 'Successfully Login! Welcome Back'];
            return response()->json($response);
        }else if($user=='[]'){
            $response = ['status' => 500, 'message' => 'No account found with this email'];
            return response()->json($response);
        }else{
            $response = ['status' => 500, 'message' => 'Wrong email or password! Please try again'];
            return response()->json($response);
        }
    }
}
