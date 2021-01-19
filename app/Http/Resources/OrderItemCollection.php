<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderItemCollection extends ResourceCollection
{
    public $collects = OrderItem::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function (OrderItem $orderItem) {
                return new OrderItemResource($orderItem);
            }),
            'total_amount' => $this->collection->map(function (OrderItem $orderItem) {
                return $orderItem->totalAmount();
            })->sum(),
        ];
    }
}
