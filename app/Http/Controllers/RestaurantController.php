<?php

namespace App\Http\Controllers;

use App\Http\Resources\RestaurantCollection;
use App\Models\Restaurant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return new RestaurantCollection(Restaurant::all());
    }
}
