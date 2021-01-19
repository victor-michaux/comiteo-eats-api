<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'street_address' => $this->faker->streetAddress,
            'zip_code' => Str::of($this->faker->postcode)->replace(' ', ''),
            'city' => $this->faker->city,
            'category' => $this->faker->randomElement(Restaurant::CATEGORIES),
            // the dishes

            // starters
            // main dishes
            // desserts
            // drinks
        ];
    }

    protected function withFaker()
    {
        return \Faker\Factory::create('fr_FR');
    }
}
