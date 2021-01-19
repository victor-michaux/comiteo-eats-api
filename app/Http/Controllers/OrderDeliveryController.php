<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderDeliveryController extends Controller
{
    public function index()
    {
        $deliveryMethods = collect(Order::DELIVERY_METHODS)->map(function (string $deliveryMethod) {
            return [
                'value' => $deliveryMethod,
                'label' => Order::DELIVERY_METHODS_LABELS[$deliveryMethod],
                'price' => Order::DELIVERY_FEES[$deliveryMethod],
                'eta' => Order::DELIVERY_ETA[$deliveryMethod]
            ];
        });

        return new JsonResponse($deliveryMethods);
    }
}
