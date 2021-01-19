<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'street_address' => $this->street_address,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
            'category' => $this->category,
            'category_label' => Restaurant::CATEGORIES_LABEL[$this->category],
            'ratings_average' => round($this->ratings->avg('rating')),
            'ratings_count' => $this->ratings->count(),
            'dishes' => new DishCollection($this->dishes),
            'profile_picture' => $this->profilePicture(),
            'cover_picture' => $this->coverPicture(),
        ];
    }
}
