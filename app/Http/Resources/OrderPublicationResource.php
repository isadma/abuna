<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderPublicationResource extends JsonResource
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
            "orderNumber" => str_pad( $this->order->id, 6, "0", STR_PAD_LEFT ),
            "orderTime" => $this->order->time,
            "publicationName" => $this->publication->name,
            "publicationType" => $this->publication->type->name,
            "publicationIndex" => $this->publication->index,
            "publicationOwner" => $this->publication->owner,
            "publicationImage" => asset($this->publication->image),
            "quantity" => $this->quantity,
            "city" => $this->address->branch->city->name,
            "street" => $this->address->street,
            "home" => $this->address->home,
            "block" => $this->block,
            "house" => $this->house,
            "months" => OrderMonthResource::collection($this->periods)
        ];
    }
}
