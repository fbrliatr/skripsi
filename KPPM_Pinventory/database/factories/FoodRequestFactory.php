<?php

namespace Database\Factories;

use App\Models\FoodCategory;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodRequest>
 */
class FoodRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kecamatan = Kecamatan::inRandomOrder()->first();

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'kecamatan_id' => $kecamatan->id ,
            'place_code' => '0',
            'food_id' => FoodCategory::inRandomOrder()->first()->id,
            'description' => fake()->text,
            'number' => fake()->randomNumber(),
            'status' => 'requested',
            'request_category' => 'food',
            'supported_document' => 'doc',
        ];

    }
}
