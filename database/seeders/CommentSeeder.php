<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Article::all()->each(function ($article) use($faker){

            Comment::factory(rand(0,10))->make(['article_id' => $article->id])->each(function ($comment) use ($faker, $article) {
                $comment->created_at = $faker->dateTimeBetween($article->created_at, 'now');
                $comment->updated_at = $faker->dateTimeBetween($comment->created_at, 'now');
                if(rand(0,1)){
                    $comment->updated_at = $comment->created_at;
                }
                $comment->user_id = User::inRandomOrder()->first()->id;
                $comment->save();
            });
        });
    }
}
