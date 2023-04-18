<?php

namespace App\Http\Resources;

use App\Address;
use App\Branch;
use Illuminate\Http\Resources\Json\JsonResource;

class CityAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $branches = Branch::whereCityId($this->id)->pluck('id');
        $addresses = Address::whereIn('branch_id', $branches)->get();
        return [
            'cityId' => $this->id,
            'cityName' => $this->name,
            'streets' => AddressResource::collection($addresses)
        ];
    }
}
