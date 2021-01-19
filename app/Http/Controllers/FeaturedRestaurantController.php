<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FeaturedRestaurantController extends Controller
{
    public function show()
    {
        $featuredRestaurant = Restaurant::all()->random();

        return new RestaurantResource($featuredRestaurant);
    }
}
