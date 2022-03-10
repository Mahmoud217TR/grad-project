<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'content' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'status' => Post::getStatus('published'),
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

    public function drafted()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Post::getStatus('drafted'),
            ];
        });
    }

    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Post::getStatus('published'),
            ];
        });
    }

    public function archived()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Post::getStatus('archived'),
            ];
        });
    }
}
