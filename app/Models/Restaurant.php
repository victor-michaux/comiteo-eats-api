<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Restaurant extends Model
{
    public const ASIAN = 'asian';
    public const FAST_FOOD = 'fast_food';
    public const ITALIAN = 'italian';

    public const CATEGORIES = [
        self::ASIAN,
        self::FAST_FOOD,
        self::ITALIAN,
    ];

    public const CATEGORIES_LABEL = [
        self::ASIAN => 'japonais',
        self::FAST_FOOD => 'fast food',
        self::ITALIAN => 'italien',
    ];

    use HasFactory, Searchable;

    public function dishes(): HasMany
    {
        return $this->hasMany(Dish::class);
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'street_address' => $this->street_address,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
            'category' => $this->category,
            'category_label' => Restaurant::CATEGORIES_LABEL[$this->category],
            'dishes' => $this->dishes->toArray(),
            'profile_picture' => $this->profilePicture(),
            'cover_picture' => $this->coverPicture(),
        ];
    }

    public function profilePicture()
    {
        return $this->image.'&auto=format&fit=crop&w=400&h=400&q=50';
    }

    public function coverPicture()
    {
        return $this->image.'&auto=format&fit=crop&w=1000&h=300&q=50';
    }
}
