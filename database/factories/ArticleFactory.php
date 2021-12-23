<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $created = $this->faker->dateTimeBetween('-3 years', 'now');
        $updated = $this->faker->dateTimeBetween($created, 'now');
        if(rand(0,1)){
            $updated = $created;
        }
        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(3, true),
            'created_at' => $created,
            'updated_at' => $updated
        ];
    }
}
