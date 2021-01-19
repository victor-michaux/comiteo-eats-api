<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Dish extends Model
{
    public const STARTER = 'starter';
    public const MAIN = 'main';
    public const DESSERT = 'dessert';
    public const DRINK = 'drink';

    public const TYPES = [
        self::STARTER,
        self::MAIN,
        self::DESSERT,
        self::DRINK,
    ];

    use HasFactory;

    public function toArray()
    {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
        ];
    }
}
