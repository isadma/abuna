<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StateAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'stateId' => $this->id,
            'stateName' => $this->name,
            'cities' => CityAllResource::collection($this->cities)
        ];
    }
}
