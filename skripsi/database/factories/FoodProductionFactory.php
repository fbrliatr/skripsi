<?php

namespace Database\Factories;

use App\Models\FoodCategory;
use App\Models\Divisi;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodProduction>
 */
class FoodProductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

            $kecamatan = Divisi::inRandomOrder()->first();
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'divisi_id' => $divisi->id ,
            // 'kota_id' => $divisi->kota->id,
            // 'provinsi_id' => $kecamatan->kota->provinsi->id,
            'place_code' => '0',
            'food_id' => FoodCategory::inRandomOrder()->first()->id,
            'title' => fake()->company,
            'description' => fake()->text,
            'number' => fake()->randomNumber(),
            // 'status' => 'oke',
        ];

    }
}
