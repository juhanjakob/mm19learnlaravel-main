<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
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
            Image::factory(rand(0,5))->create(['article_id' => $article->id]);
        }
    }
}
