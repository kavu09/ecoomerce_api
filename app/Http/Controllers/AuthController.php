<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{
    //register user
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => "required|string|max:255",
                'email' => "required|email|unique:users",
                "password" => "required|min:8",
            ]
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 400]);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json($user, 201);
    }

    //login user ad return jwt token
    public function login(Request $request){
        $credentials = $request->only('email','password');
        if($token=JWTAuth::attempt($credentials))
        { if ($request->expectsJson()) {
            return response()->json(['token'=>$token]);
        }
        $products =Product::paginate(10);

        return view('products.index', compact('products'));

        }
        return response()->json(['error'=>'Unauthorized'],401);
    }

    //logout user 

 public function logout(Request $request)
    {
        try {
            $token = JWTAuth::getToken();
            
            if (!$token) {
                return response()->json(['error' => 'Token is required'], 400);
            }
    
            JWTAuth::invalidate($token);
    
            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not invalidate the token'], 500);
        }
    }
    
}
