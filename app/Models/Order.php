<?php

namespace App\Models;

use App\Http\Requests\StoreOrderRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    public const WALK = 'walk';
    public const BIKE = 'bike';
    public const CAR = 'car';
    public const SCOOTER = 'scooter';
    public const ELECTRIC_SCOOTER = 'electric_scooter';

    public const DELIVERY_METHODS = [
        self::WALK,
        self::BIKE,
        self::CAR,
        self::SCOOTER,
        self::ELECTRIC_SCOOTER,
    ];

    public const DELIVERY_FEES = [
        self::WALK => 1000,
        self::BIKE => 300,
        self::CAR => 1000,
        self::SCOOTER => 500,
        self::ELECTRIC_SCOOTER => 400,
    ];

    // in minutes
    public const DELIVERY_ETA = [
        self::WALK => 15,
        self::BIKE => 7,
        self::CAR => 5,
        self::SCOOTER => 3,
        self::ELECTRIC_SCOOTER => 4,
    ];

    public const DELIVERY_METHODS_LABELS = [
        self::WALK => 'pied',
        self::BIKE => 'vélo',
        self::CAR => 'voiture',
        self::SCOOTER => 'scooter',
        self::ELECTRIC_SCOOTER => 'trottinette électrique',
    ];

    use HasFactory;

    protected $guarded = null;

    public static function createFromRequest(StoreOrderRequest $request): self
    {
        $order = Order::create(
            [
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'delivery_method' => $deliveryMethod = $request->get('delivery_method', self::BIKE),
                'delivery_street_address' => $request->get('delivery_street_address'),
                'delivery_zip_code' => $request->get('delivery_zip_code'),
                'delivery_city' => $request->get('delivery_city'),
                'delivery_fee' => self::DELIVERY_FEES[$deliveryMethod],
            ]
        );

        $items = collect($request->get('items'))
            ->map(
                function (array $item) {
                    $dish = Dish::find($item['id']);
                    $orderItem = new OrderItem();
                    $orderItem->name = $dish->name;
                    $orderItem->price = $dish->price;
                    $orderItem->quantity = $item['quantity'];
                    return $orderItem;
                }
            );

        $order->items()->saveMany($items);

        return $order;
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function totalAmount()
    {
        $orderItemsAmount = $this->items->map(function (OrderItem $orderItem) {
            return $orderItem->totalAmount();
        })->sum();

        return $this->delivery_fee + $orderItemsAmount;
    }

    public function deliveryEta(): \DateTime
    {
        $deliveryInMinutes = self::DELIVERY_ETA[$this->delivery_method];
        $itemsQuantity = $this->items()->sum('quantity');

        $etaInMinutes = $deliveryInMinutes + $itemsQuantity * 3;

        return $this->created_at->addMinutes($etaInMinutes);
    }
}
