<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class seed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:interactive {--a|advanced} {--u|user_info} {--i|db_info}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if($this->option('advanced')){
            $users = $this->ask('How Many Users do you want?');
            $userSnippets = $this->ask('How Many Snippets should a User have?');
            $reviewers = $this->ask('How Many Reviewers do you want?');
            $reviewerSnippets = $this->ask('How Many Snippets should a Reviewer have?');
            $editors = $this->ask('How Many Editors do you want?');
            $editorSnippets = $this->ask('How Many Snippets should an Editor have?');
            $editorPost = $this->ask('How Many Posts should an Editor have?');
            $tags = $this->ask('How Many Tags do you want?');
            $tagsPerSnippet = $this->ask('How Many Tags should a Snippet have?');
            $tagsPerPost = $this->ask('How Many Tags should a Post have?');
            $commentsPerPost = $this->ask('How Many Comments should a Post have?');
            $generic = $this->confirm('Do you want to Generate Generic Users?');

            if($this->confirm("Are you Sure You want to Proceed")){
                seed_db($tags, $users, $reviewers, $editors, $generic, $userSnippets, $reviewerSnippets, $editorSnippets, $editorPost, $tagsPerSnippet, $tagsPerPost, $commentsPerPost);
                $this->info('Database was seeded Successfully');
            }
        }else{
            $users = $this->ask('How Many Users do you want?');
            $reviewers = $this->ask('How Many Reviewers do you want?');
            $editors = $this->ask('How Many Editors do you want?');
            $tags = $this->ask('How Many Tags do you want?');
            $generic = $this->confirm('Do you want to Generate Generic Users?');

            if($this->confirm("Are you Sure You want to Proceed")){
                seed_db($tags, $users, $reviewers, $editors, $generic);
                $this->info('Database was seeded Successfully');
            }
        }
        
        if($this->option('users_info')){
            db_users();
        }

        if($this->option('db_info')){
            db_stat();
        }
    }
}
