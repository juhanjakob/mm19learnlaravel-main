<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(20)->create();
        $articles = Article::all();

        foreach ($articles as $article){
            $tags = Tag::inRandomOrder()->take(rand(0,5))->get();
            $article->tags()->attach($tags);
        }
    }
}
