<?php

namespace Database\Seeders;

use App\Models\Code;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Post;
use App\Models\Profile;
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

        global $allSnippets;
        global $allPosts;
        global $allTags;
        global $allUsers;
        $allSnippets = [];
        $allPosts = [];
        $allTags = [];
        $allUsers = [];
        
        foreach(generate_generic_useres() as $user){
            array_push($allUsers,$user);
        }

        echo "Generating Tags....\n";
        $tags = Tag::factory(rand(3,20))->create();
        array_push($allTags,$tags);
        echo $tags->count()." Tags Generated!!\n";

        echo "Generating Users....\n";
        $numberOfUsers = rand(10,30);
        User::factory($numberOfUsers)->create(['role' => 0])->each(function ($user){
            global $allSnippets;
            global $allUsers;
            $user->profile()->save(Profile::factory()->withoutUser()->make());
            echo "Generating Snipints for user ".$user->id."...\n";
            $snippets = Snippet::factory(rand(0,4))->requested()->withoutUser()->make();
            $user->snippets()->saveMany($snippets);
            foreach($user->snippets as $snippet){
                array_push($allSnippets,$snippet);
            }
            array_push($allUsers,$user);
        });
        echo $numberOfUsers." Users Generated!!\n";

        echo "Generating Reviewers....\n";
        $numberOfReviewers = rand(3,9);
        User::factory($numberOfReviewers)->create(['role' => 1])->each(function ($user){
            global $allSnippets;
            global $allUsers;
            $user->profile()->save(Profile::factory()->withoutUser()->make());
            echo "Generating Snipints for reviewer ".$user->id."...\n";
            $snippets = Snippet::factory(rand(0,4))->requested()->withoutUser()->make();
            $user->snippets()->saveMany($snippets);
            foreach($user->snippets as $snippet){
                array_push($allSnippets,$snippet);
            }
            array_push($allUsers,$user);
        });
        echo $numberOfReviewers." Reviewers Generated!!\n";

        echo "Generating Editors....\n";
        $numberOfEditors = rand(2,6);
        User::factory($numberOfEditors)->create(['role' => 2])->each(function ($user){
            global $allSnippets;
            global $allPosts;
            global $allUsers;
            $user->profile()->save(Profile::factory()->withoutUser()->make());
            echo "Generating Snipints for editor ".$user->id."...\n";
            $snippets = Snippet::factory(rand(0,4))->approved()->withoutUser()->make();
            $user->snippets()->saveMany($snippets);
            foreach($user->snippets as $snippet){
                array_push($allSnippets,$snippet);
            }
            echo "Generating Posts for editor ".$user->id."...\n";
            $posts = Post::factory(rand(0,8))->withoutUser()->make();
            $user->posts()->saveMany($posts);
            foreach($user->posts as $post){
                array_push($allPosts,$post);
            }
            array_push($allUsers,$user);
        });
        echo $numberOfEditors." Editors Generated!!\n";
        echo "Total of ".count($allUsers)." Users where Generated!!\n";
        
        foreach($allSnippets as $snippet){
            echo "Attaching tags for snippet ".$snippet->id."...\n";
            $snippet->tags()->attach(Tag::inRandomOrder()->limit(rand(0,$tags->count()))->get());
        }
        echo "Tags Attached!!\n";
        
        $numberOfComments = 0;
        foreach($allPosts as $post){
            echo "Generating Comments for post ".$post->id."....\n";
            $comments = Comment::factory(rand(0,5))->withoutPost()->withoutUser()->make();
            foreach($comments as $comment){
                $numberOfComments += 1;
                $comment->user_id = $allUsers[array_rand($allUsers)]->id;
            }
            $post->comments()->saveMany($comments);
            echo "Attaching tags for post ".$post->id."...\n";
            $post->tags()->attach(Tag::inRandomOrder()->limit(rand(0,$tags->count()))->get());
        }
        echo $numberOfComments." Commnets Generated\n\n";

        db_stat();
    }
}
