<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicationResource extends JsonResource
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
        	'id' => $this->id,
            'index' => $this->index,
            'name' => $this->name,
            'owner' => $this->owner,
            'typeSlug' => $this->type->slug,
            'typeName' => $this->type->name,
            'image' => $this->image ? asset($this->image) : asset('images/publication/default.jpg'),
            'packageCapacity' => $this->package_capacity,
            'months' => PeriodResource::collection(
                $this->periods
                    ->where('sale_from', '<=', strtotime(now()))
                    ->where('sale_to', '>=', strtotime(now()))
                    ->where('status', '=', 1)
            )
        ];
    }
}
