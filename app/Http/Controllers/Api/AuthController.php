<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        try{
            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addYears(1);
            $token->save();
            return response()->json([
                'status' => 1,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => strtotime(Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()),
                'data' => new UserResource($user)
            ], 201);
        }
        catch (\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e
            ], Response::HTTP_NOT_IMPLEMENTED);
        }
    }

    public function login(LoginRequest $request){
        try{
            $credentials = [
                'phone' => $request->get('phone'),
                'password' => $request->get('password'),
                'status' => 1
            ];
            if(!Auth::attempt($credentials))
                return response()->json([
                    'status' => 0,
                    'message' => 'Girizen maglumatlaryňyz deň gelmedi. Täzeden synanşyň.'
                ], 401);
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if ($request->remember_me)
                $token->expires_at = Carbon::now()->addYears(1);
            $token->save();
            return response()->json([
                'status' => 1,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => strtotime(Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()),
                'data' => new UserResource($user)
            ], 201);
        }
        catch (\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e
            ], Response::HTTP_NOT_IMPLEMENTED);
        }
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'status' => 1,
            'message' => 'Üstünlikli hasapdan çykdyňyz.'
        ], Response::HTTP_OK);
    }
}
