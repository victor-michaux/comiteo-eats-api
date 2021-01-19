<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'delivery_fee' => $this->delivery_fee,
            'delivery_method' => $this->delivery_method,
            'delivery_street_address' => $this->delivery_street_address,
            'delivery_zip_code' => $this->delivery_zip_code,
            'delivery_city' => $this->delivery_city,
            'items' => new OrderItemCollection($this->items),
            'total_amount' => $this->totalAmount(),
            'delivery_eta' => $this->deliveryEta(),
            'created_at' => $this->created_at,
        ];
    }
}
