<?php

use App\Models\Code;
use App\Models\Comment;
use App\Models\Field;
use App\Models\Language;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Sheet;
use App\Models\Snippet;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

use function PHPUnit\Framework\isNull;

    if (!function_exists('db_stat')) {
        function db_stat(){ 
            echo "\n\n-------------- Total Objects in Database ---------------\n"
            ."\n\t\tUsers: \t\t".User::count()
            ."\n\t\tProfiles: \t".Profile::count()
            ."\n\t\tCodes: \t\t".Code::count()
            ."\n\t\tLanguages: \t".Language::count()
            ."\n\t\tSnippets: \t".Snippet::count()
            ."\n\t\tPosts: \t\t".Post::count()
            ."\n\t\tComments: \t".Comment::count()
            ."\n\t\tTags: \t\t".Tag::count()
            ."\n\t\tSheets: \t".Sheet::count()
            ."\n\t\tFields: \t".Field::count()
            ."\n\n--------------------------------------------------------\n\n";
        }
    }

    if (!function_exists('db_users')) {
        function db_users(){ 
            echo "\n\n-------------- Total Users in Database ---------------\n"
            ."\n\t\tUsers: \t\t\t".User::Users()->count()
            ."\n\t\tReviewrs: \t\t".User::Reviewers()->count()
            ."\n\t\tEditors: \t\t".User::Editors()->count()
            ."\n\t\tAdmins: \t\t".User::Admins()->count()
            ."\n\t\tSuper Admins: \t\t".User::SuperAdmins()->count()
            ."\n\n\t\tTotal: \t\t\t".User::count()
            ."\n\t\tSystem Admins: \t\t".User::SystemAdmins()->count()
            ."\n\t\tWebsite Admins: \t".User::WebAdmins()->count()
            ."\n\n------------------------------------------------------\n\n";
        }
    }

    if (!function_exists('generate_generic_useres')) {
        function generate_generic_useres(){ 
            $users = new Collection;
            echo "Generating Generic Users....\n";
            if(User::where('email','superadmin@users.test')->get()->count() == 0){
                $user = User::factory()->superAdmin()->create([
                    'email' => 'superadmin@users.test',
                ]);
                $user->profile()->save(Profile::factory()->withoutUser()->make());
                $users->push($user);
            }

            if(User::where('email','admin@users.test')->get()->count() == 0){
                $user = User::factory()->admin()->create([
                    'email' => 'admin@users.test',
                ]);
                $user->profile()->save(Profile::factory()->withoutUser()->make());
                $users->push($user);
            }

            if(User::where('email','editor@users.test')->get()->count() == 0){
                $user = User::factory()->editor()->create([
                    'email' => 'editor@users.test',
                ]);
                $user->profile()->save(Profile::factory()->withoutUser()->make());
                $users->push($user);
            }

            if(User::where('email','reviewer@users.test')->get()->count() == 0){
                $user = User::factory()->reviewer()->create([
                    'email' => 'reviewer@users.test',
                ]);
                $user->profile()->save(Profile::factory()->withoutUser()->make());
                $users->push($user);
            }

            if(User::where('email','user@users.test')->get()->count() == 0){
                $user = User::factory()->user()->create([
                    'email' => 'user@users.test',
                ]);
                $user->profile()->save(Profile::factory()->withoutUser()->make());
                $users->push($user);
            }
            echo "Generic Users Generated!!\n";
            
            return $users;
        }
    }

        if (!function_exists('seed_db')) {
            function seed_db($tagsNumber=0, $numberOfUsers=0, $numberOfReviewers=0,
                             $numberOfEditors=0, $genericUsers=false, $userSnippets=0, 
                             $reviewerSnippets=0, $editorSnippets=0, $editorPosts=0,
                             $tagsPerSnippet=0, $tagsPerPost=0, $commentsPerPost=0){

                $allSnippets = new Collection;
                $allPosts = new Collection;
                $allTags = new Collection;
                $allUsers = new Collection;
                
                if($genericUsers){
                    $allUsers = $allUsers->merge(generate_generic_useres());
                }

                if($tagsNumber>0){
                    echo "Generating Tags....\n";
                    $tags = Tag::factory($tagsNumber)->create();
                    $allTags = $allTags->merge($tags);
                    echo $tags->count()." Tags Generated!!\n";
                }


                echo "Generating Users....\n";
                User::factory($numberOfUsers)->user()->create()->each(function ($user) use (&$allSnippets, &$allUsers, $userSnippets){
                    $user->profile()->save(Profile::factory()->withoutUser()->make());

                    if($userSnippets>0){
                        echo "Generating Snippets for user ".$user->id."...\n";
                        $snippets = Snippet::factory($userSnippets)->requested()->withoutUser()->make();
                        $user->snippets()->saveMany($snippets);
                        $allSnippets = $allSnippets->merge($snippets);
                    }

                    $allUsers->push($user);
                });
                echo $numberOfUsers." Users Generated!!\n";

                echo "Generating Reviewers....\n";
                User::factory($numberOfReviewers)->reviewer()->create()->each(function ($user) use (&$allSnippets, &$allUsers, $reviewerSnippets){
                    $user->profile()->save(Profile::factory()->withoutUser()->make());

                    if($reviewerSnippets>0){
                        echo "Generating Snippets for reviewer ".$user->id."...\n";
                        $snippets = Snippet::factory($reviewerSnippets)->approved()->withoutUser()->make();
                        $user->snippets()->saveMany($snippets);
                        $allSnippets = $allSnippets->merge($snippets);
                    }

                    $allUsers->push($user);
                });
                echo $numberOfReviewers." Reviewers Generated!!\n";

                echo "Generating Editors....\n";
                User::factory($numberOfEditors)->editor()->create()->each(function ($user) use (&$allSnippets, &$allUsers, &$allPosts, $editorSnippets, $editorPosts){
                    $user->profile()->save(Profile::factory()->withoutUser()->make());

                    if($editorSnippets>0){
                        echo "Generating Snippets for editor ".$user->id."...\n";
                        $snippets = Snippet::factory($editorSnippets)->approved()->withoutUser()->make();
                        $user->snippets()->saveMany($snippets);
                        $allSnippets = $allSnippets->merge($snippets);
                    }

                    if($editorPosts>0){
                        echo "Generating Posts for editor ".$user->id."...\n";
                        $posts = Post::factory($editorPosts)->withoutUser()->make();
                        $user->posts()->saveMany($posts);
                        $allPosts = $allPosts->merge($posts);
                    }
                    
                    $allUsers->push($user);
                });
                echo $numberOfEditors." Editors Generated!!\n";

                echo "Total of ".$allUsers->count()." Users where Generated!!\n";
                echo "Total of ".$allSnippets->count()." Snippets where Generated!!\n";
                echo "Total of ".$allPosts->count()." Posts where Generated!!\n";
                
                foreach($allSnippets as $snippet){
                    echo "Attaching tags for snippet ".$snippet->id."...\n";
                    $snippet->tags()->attach($tags->random($tagsPerSnippet));
                }
                echo "Tags Attached!!\n";
                
                $numberOfComments = 0;
                foreach($allPosts as $post){
                    echo "Generating Comments for post ".$post->id."....\n";
                    $comments = Comment::factory($commentsPerPost)->withoutPost()->withoutUser()->make();
                    foreach($comments as $comment){
                        $numberOfComments += 1;
                        $comment->user_id = $allUsers->random()->id;
                    }
                    $post->comments()->saveMany($comments);
                    echo "Attaching tags for post ".$post->id."...\n";
                    $post->tags()->attach($tags->random($tagsPerPost));
                }
                echo $numberOfComments." Commnets Generated\n\n";
            }
        }
?>