<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    // подключаем модель к фабрике
    protected $model = Tag::class;

    // запись данных происходит в таблицу через подключенную модель
    public function definition()
    {
        return [
            'title_tag' => $this->faker->companySuffix,
        ];
    }
}
