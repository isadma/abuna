<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\OrderPublicationResource;
use App\Http\Resources\PurchaseResource;
use App\Http\Resources\UserResource;
use App\OrderPublication;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){
        try{
            return response()->json([
                'status' => 1,
                'profile' => new UserResource(Auth::user()),
                'purchases' => PurchaseResource::collection(Auth::user()->orders->where('status', 'completed'))
            ], Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function purchases(){
        try{
            $purchases = Auth::user()->orders->where('status', 'completed')->pluck('id');
            return response()->json([
                'status' => 1,
                'purchases' => OrderPublicationResource::collection(OrderPublication::whereIn('order_id', $purchases)->get()),
            ], Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changePassword(ChangePasswordRequest $request){
        try{
            if (Hash::check($request->currentPassword, Auth::user()->password)){
                $user = Auth::user();
                $user->update(['password' => Hash::make($request->newPassword)]);
                return response()->json([
                    'status' => 1,
                    'message' => 'Gizlin belgi üstünlikli üýtgedildi.'
                ], Response::HTTP_OK);
            }
            return response()->json([
                'status' => 0,
                'message' => 'Öňki gizlin belgiňiz nädogry.'
            ], Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateProfile(UpdateProfileRequest $request){
        try{
            $user = Auth::user();
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'phone' => $request->phone,
            ]);
            return response()->json([
                'status' => 1,
                'message' => 'Maglumatlaryňyz üstünlikli üýtgedildi.',
                'profile' => new UserResource(Auth::user()),
            ], Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
