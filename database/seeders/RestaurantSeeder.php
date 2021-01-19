<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Rating;
use App\Models\Restaurant;
use Database\Factories\DishFactory;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ITALIAN,
                    'image' => 'https://images.unsplash.com/photo-1579684947550-22e945225d9a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ITALIAN,
                    'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ITALIAN,
                    'image' => 'https://images.unsplash.com/photo-1600346019001-8d56d1b51d59?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ITALIAN,
                    'image' => 'https://images.unsplash.com/photo-1551183053-bf91a1d81141?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ASIAN,
                    'image' => 'https://images.unsplash.com/photo-1503764654157-72d979d9af2f?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ASIAN,
                    'image' => 'https://images.unsplash.com/photo-1540648639573-8c848de23f0a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::ASIAN,
                    'image' => 'https://images.unsplash.com/photo-1496116218417-1a781b1c416c?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::FAST_FOOD,
                    'image' => 'https://images.unsplash.com/photo-1561758033-d89a9ad46330?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::FAST_FOOD,
                    'image' => 'https://images.unsplash.com/photo-1550547660-d9450f859349?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1',
                ]
            );

        Restaurant::factory()
            ->has(Dish::factory()->count(10))
            ->has(Rating::factory()->count(3))
            ->create(
                [
                    'category' => Restaurant::FAST_FOOD,
                    'image' => 'https://images.unsplash.com/photo-1426869981800-95ebf51ce900?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D',
                ]
            );
    }
}
