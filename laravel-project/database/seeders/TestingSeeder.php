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
        seed_db(rand(3,20), rand(10,30), rand(3,9), rand(2,6),true,rand(0,2),rand(0,4),rand(0,2),rand(0,4),rand(1,3),rand(1,3),rand(0,4),rand(0,4));
        db_stat();
    }
}
