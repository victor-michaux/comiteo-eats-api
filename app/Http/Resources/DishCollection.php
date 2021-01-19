<?php

namespace App\Http\Resources;

use App\Models\Dish;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DishCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'total' => $this->collection->count(),
        ];
    }
}
