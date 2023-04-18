<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PurchaseResource extends JsonResource
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
            "orderNumber" => str_pad( $this->id, 6, "0", STR_PAD_LEFT ),
            "orderTime" => $this->time,
            "orderTotalPrice" => $this->amount,
            "publications" => OrderPublicationResource::collection($this->publications)
        ];
    }
}
