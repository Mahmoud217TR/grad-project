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

        generate_generic_useres();

        echo "Generating Tags....\n";
        $numberOfTags = rand(3,20);
        Tag::factory($numberOfTags)->create();
        echo $numberOfTags." Tags Generated!!\n";

        echo "Generating Users....\n";
        $numberOfUsers = rand(10,30);
        User::factory($numberOfUsers)->create(['role' => 0])->each(function ($user){
            echo "Generating Snipints for user ".$user->id."...\n";
            $user->snippets()->saveMany(Snippet::factory(rand(0,2))->make(['status'=> 0]));
        });
        echo $numberOfUsers." Users Generated!!\n";

        echo "Generating Reviewers....\n";
        $numberOfReviewers = rand(3,9);
        User::factory($numberOfReviewers)->create(['role' => 1])->each(function ($user){
            echo "Generating Snipints for reviewer ".$user->id."...\n";
            $user->snippets()->saveMany(Snippet::factory(rand(0,4))->make(['status'=> 1]));
        });
        echo $numberOfReviewers." Reviewers Generated!!\n";

        echo "Generating Editors....\n";
        $numberOfEditors = rand(2,6);
        User::factory($numberOfEditors)->create(['role' => 2])->each(function ($user){
            echo "Generating Snipints for editor ".$user->id."...\n";
            $user->snippets()->saveMany(Snippet::factory(rand(0,4))->make(['status'=> 1]));
            echo "Generating Posts for editor ".$user->id."...\n";
            $user->posts()->saveMany(Post::factory(rand(0,8))->make());
        });
        echo $numberOfEditors." Editors Generated!!\n";
        
        $snippets = Snippet::all();
        foreach($snippets as $snippet){
            echo "Attaching tags for snippet ".$snippet->id."...\n";
            $snippet->tags()->attach(Tag::inRandomOrder()->limit(rand(0,$numberOfTags))->get());
        }
        echo "Tags Attached!!\n";

        $posts = Post::all();
        $numberOfComments = 0;
        foreach($posts as $post){
            echo "Generating Comments for post ".$post->id."....\n";
            $post->comments()->saveMany(Comment::factory(rand(0,4))->make());
            $numberOfComments += $post->comments->count();
            echo "Attaching tags for post ".$post->id."...\n";
            $post->tags()->attach(Tag::inRandomOrder()->limit(rand(0,$numberOfTags))->get());
        }
        echo $numberOfComments." Commnets with new Users Generated\n\n";

        db_stat();
    }
}
