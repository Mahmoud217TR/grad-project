<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(),
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
            'status' => Comment::getStatus('published'),
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

    public function withoutPost()
    {
        return $this->state(function (array $attributes) {
            return [
                'post_id' => null,
            ];
        });
    }

    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Comment::getStatus('published'),
            ];
        });
    }

    public function hidden()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Comment::getStatus('hidden'),
            ];
        });
    }

    public function archived()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => Comment::getStatus('archived'),
            ];
        });
    }
}
