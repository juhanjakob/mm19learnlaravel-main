<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::all();

        foreach ($articles as $article){
            $count = rand(0, User::count());
            $users = User::inRandomOrder()->take($count)->get();
            Like::factory($count)->make(['article_id' => $article->id])->each(function ($like, $key) use ($users){
                $like->user_id = $users[$key]->id;
                $like->save();
            });
        }
    }
}
