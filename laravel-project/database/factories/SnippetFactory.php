<?php

namespace Database\Factories;

use App\Models\Code;
use App\Models\Language;
use App\Models\Snippet;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Snippet>
 */
class SnippetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code_snippet' => $this->faker->paragraph(),
            'note' => $this->faker->paragraph(),
            'status' => Snippet::getStatus('approved'),
            'user_id' => User::factory(),
            'language_id' => Language::factory(),
            'code_id' => Code::factory(),
        ];
    }

    public function withoutUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'user_id' => null,
            ];
        });
    }


    public function withoutCode()
    {
        return $this->state(function (array $attributes) {
            return [
                'code_id' => null,
            ];
        });
    }

    public function withoutLanguage()
    {
        return $this->state(function (array $attributes) {
            return [
                'language_id' => null,
            ];
        });
    }

    public function requested()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Snippet::getStatus('requested'),
            ];
        });
    }

    public function approved()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Snippet::getStatus('approved'),
            ];
        });
    }
}
