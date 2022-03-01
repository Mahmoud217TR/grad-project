<?php

use App\Models\Code;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Post;
use App\Models\Snippet;
use App\Models\Tag;
use App\Models\User;

use function PHPUnit\Framework\isNull;

    if (!function_exists('db_stat')) {
        function db_stat(){ 
            echo "\n\n-------------- Total Objects in Database ---------------\n"
            ."\n\t\tUsers: \t\t".User::count()
            ."\n\t\tCodes: \t\t".Code::count()
            ."\n\t\tLanguages: \t".Language::count()
            ."\n\t\tSnippets: \t".Snippet::count()
            ."\n\t\tPosts: \t\t".Post::count()
            ."\n\t\tComments: \t".Comment::count()
            ."\n\t\tTags: \t\t".Tag::count()
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
            echo "Generating Generic Users....\n";
            if(User::where('email','superadmin@users.test')->get()->count() == 0){
                User::factory()->create([
                    'email' => 'superadmin@users.test',
                    'password' => '$2y$10$wETeRkfN6IIbOZfWztDxBOTMa/3MtD7.G/IhMEs2OdCn8x57MHGH6',
                    'role' => '4'
                ]);
            }

            if(User::where('email','admin@users.test')->get()->count() == 0){
                User::factory()->create([
                    'email' => 'admin@users.test',
                    'password' => '$2y$10$wETeRkfN6IIbOZfWztDxBOTMa/3MtD7.G/IhMEs2OdCn8x57MHGH6',
                    'role' => '3'
                ]);
            }

            if(User::where('email','editor@users.test')->get()->count() == 0){
                User::factory()->create([
                    'email' => 'editor@users.test',
                    'password' => '$2y$10$wETeRkfN6IIbOZfWztDxBOTMa/3MtD7.G/IhMEs2OdCn8x57MHGH6',
                    'role' => '2'
                ]);
            }

            if(User::where('email','reviewer@users.test')->get()->count() == 0){
                User::factory()->create([
                    'email' => 'reviewer@users.test',
                    'password' => '$2y$10$wETeRkfN6IIbOZfWztDxBOTMa/3MtD7.G/IhMEs2OdCn8x57MHGH6',
                    'role' => '1'
                ]);
            }

            if(User::where('email','user@users.test')->get()->count() == 0){
                User::factory()->create([
                    'email' => 'user@users.test',
                    'password' => '$2y$10$wETeRkfN6IIbOZfWztDxBOTMa/3MtD7.G/IhMEs2OdCn8x57MHGH6',
                    'role' => '0'
                ]);
            }
            echo "Generic Users Generated!!\n";

            return true;
        }
    }
?>