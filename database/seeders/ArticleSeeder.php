<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Article::factory(1000)->make()->each(function ($article){
            $article->user_id = User::inRandomOrder()->first()->id;
            $article->save();
        });
    }
}
