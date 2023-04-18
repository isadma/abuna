<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PublicationResource;
use App\Publication;
use App\Type;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublicationController extends Controller
{
    public function types(){
        try{
            return response()->json([
                'status' => 1,
                'types' => Type::select('name', 'slug')->get()
            ], Response::HTTP_OK);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function publications($type){
        try{
            $type = Type::where('slug', $type)->first();
            if ($type){
                return response()->json([
                    'status' => 1,
                    'publications' => PublicationResource::collection(
                        Publication::whereHas('periods', function (Builder $query) {
                                $query->where('sale_from', '<=', strtotime(now()))
                                    ->where('sale_to', '>=', strtotime(now()))
                                    ->where('status', '=', 1);
                            })
                            ->whereTypeId($type->id)
                            ->where('status', 1)
                            ->get()
                    )
                ], Response::HTTP_OK);
            }
            return response()->json([
                'status' => 0,
                'message' => 'Invalid type slug'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
