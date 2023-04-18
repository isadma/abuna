<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PeriodResource extends JsonResource
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
            'periodId' => $this->id,
            'month' => $this->month,
            'year' => $this->year,
            'price' => $this->price
        ];
    }
}
