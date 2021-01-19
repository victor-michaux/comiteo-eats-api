<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestaurantRatingRequest;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantRatingController extends Controller
{
    public function store(StoreRestaurantRatingRequest $request, Restaurant $restaurant)
    {
        $restaurant->ratings()->create([
            'rating' => $request->request->get('rating'),
        ]);

        return new RestaurantResource($restaurant);
    }
}
