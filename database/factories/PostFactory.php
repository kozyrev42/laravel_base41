<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    // подключаем модель к фабрике
    protected $model = Post::class;

    // запись данных происходит в таблицу через подключенную модель
    public function definition()
    {
        return [
            'title' => $this->faker->lastName,
            'post_content'  => $this->faker->lastName,
            'image'  => $this->faker->lastName,
            'is_published' => 1,
            // привязка рандомной категории к посту
            'category_id' => Category::get()->random()->id,
        ];
    }
}
