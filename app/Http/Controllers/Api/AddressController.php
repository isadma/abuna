<?php

namespace App\Http\Controllers\Api;

use App\Address;
use App\Branch;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\StateAllResource;
use App\Http\Resources\StateResource;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddressController extends Controller
{

    public function all(){
        try{
            return response()->json(StateAllResource::collection(State::orderBy('name')->get()), Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function states(){
        try{
            return response()->json(StateResource::collection(State::orderBy('name')->get()), Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function cities($state_id){
        try{
            return response()->json(CityResource::collection(City::where('state_id', $state_id)->orderBy('name')->get()), Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function streets($city_id){
        try{
            $branches = Branch::whereCityId($city_id)->pluck('id');
            return response()->json(
                AddressResource::collection(
                    Address::whereIn('branch_id', $branches)
                        ->groupBy('street')
                        ->orderBy('street')
                        ->select('id', 'street')
                        ->get()
                ),
                Response::HTTP_OK
            );
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
