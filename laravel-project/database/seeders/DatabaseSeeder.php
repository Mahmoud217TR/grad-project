<?php

namespace Database\Seeders;

use App\Models\Code;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Post;
use App\Models\Snippet;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        // \App\Models\User::factory(10)->create();
        echo "Generating Users....\n";
        User::factory(rand(10,15))->create()->each(function ($user){
            echo "Generating Snipints for user".$user->id."...\n";
            $user->snippets()->saveMany(Snippet::factory(rand(0,4))->make());
            if($user->role > 1){
                echo "Generating Posts for user".$user->id."...\n";
                $user->posts()->saveMany(Post::factory(rand(0,5))->make());
            }
        });
        
        $posts = Post::all();
        foreach($posts as $post){
            echo "Generating Comments for post ".$post->id."....\n";
            $post->comments()->saveMany(Comment::factory(rand(0,8))->make());
        }
        
        echo "Generating Tags....\n";
        Tag::factory(10)->create();
    }
}
