<?php

namespace Database\Factories;

use App\Models\Sheet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Field>
 */
class FieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'info' => $this->faker->paragraph(),
            'sheet_id' => Sheet::factory(),
        ];
    }

    public function withoutSheet(){
        return $this->state(function (array $attributes) {
            return [
                'sheet_id' => null,
            ];
        });
    }
}
