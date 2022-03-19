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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allSnippets = new Collection;
        $allPosts = new Collection;
        $allTags = new Collection;
        $allUsers = new Collection;
        
        $allUsers = $allUsers->merge(generate_generic_useres());

        echo "Generating Tags....\n";
        $tags = Tag::factory(rand(3,20))->create();
        $allTags = $allTags->merge($tags);
        echo $tags->count()." Tags Generated!!\n";


        echo "Generating Users....\n";
        $numberOfUsers = rand(10,30);
        User::factory($numberOfUsers)->user()->create()->each(function ($user) use (&$allSnippets,&$allUsers){
            $user->profile()->save(Profile::factory()->withoutUser()->make());

            echo "Generating Snippets for user ".$user->id."...\n";
            $snippets = Snippet::factory(rand(0,4))->requested()->withoutUser()->make();
            $user->snippets()->saveMany($snippets);
            $allSnippets = $allSnippets->merge($snippets);

            $allUsers->push($user);
        });
        echo $numberOfUsers." Users Generated!!\n";

        echo "Generating Reviewers....\n";
        $numberOfReviewers = rand(3,9);
        User::factory($numberOfReviewers)->reviewer()->create()->each(function ($user) use (&$allSnippets,&$allUsers){
            $user->profile()->save(Profile::factory()->withoutUser()->make());

            echo "Generating Snippets for reviewer ".$user->id."...\n";
            $snippets = Snippet::factory(rand(0,4))->approved()->withoutUser()->make();
            $user->snippets()->saveMany($snippets);
            $allSnippets = $allSnippets->merge($snippets);

            $allUsers->push($user);
        });
        echo $numberOfReviewers." Reviewers Generated!!\n";

        echo "Generating Editors....\n";
        $numberOfEditors = rand(2,6);
        User::factory($numberOfEditors)->editor()->create()->each(function ($user) use (&$allSnippets,&$allUsers,&$allPosts){
            $user->profile()->save(Profile::factory()->withoutUser()->make());

            echo "Generating Snippets for editor ".$user->id."...\n";
            $snippets = Snippet::factory(rand(0,4))->approved()->withoutUser()->make();
            $user->snippets()->saveMany($snippets);
            $allSnippets = $allSnippets->merge($snippets);

            echo "Generating Posts for editor ".$user->id."...\n";
            $posts = Post::factory(rand(0,8))->withoutUser()->make();
            $user->posts()->saveMany($posts);
            $allPosts = $allPosts->merge($posts);
            
            $allUsers->push($user);
        });
        echo $numberOfEditors." Editors Generated!!\n";
        echo "Total of ".$allUsers->count()." Users where Generated!!\n";
        
        foreach($allSnippets as $snippet){
            echo "Attaching tags for snippet ".$snippet->id."...\n";
            $snippet->tags()->attach($tags->random(rand(0,$tags->count())));
        }
        echo "Tags Attached!!\n";
        
        $numberOfComments = 0;
        foreach($allPosts as $post){
            echo "Generating Comments for post ".$post->id."....\n";
            $comments = Comment::factory(rand(0,5))->withoutPost()->withoutUser()->make();
            foreach($comments as $comment){
                $numberOfComments += 1;
                $comment->user_id = $allUsers->random()->id;
            }
            $post->comments()->saveMany($comments);
            echo "Attaching tags for post ".$post->id."...\n";
            $post->tags()->attach($tags->random(rand(0,$tags->count())));
        }
        echo $numberOfComments." Commnets Generated\n\n";

        db_stat();
    }
}
