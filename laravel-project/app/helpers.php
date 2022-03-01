<?php

use App\Models\Code;
use App\Models\Comment;
use App\Models\Language;
use App\Models\Post;
use App\Models\Snippet;
use App\Models\Tag;
use App\Models\User;

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
?>