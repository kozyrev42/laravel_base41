<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    // подключаем модель к фабрике
    protected $model = Category::class;

    // запись данных происходит в таблицу через подключенную модель
    public function definition()
    {
        return [
            'title' => $this->faker->companySuffix,
        ];
    }
}
