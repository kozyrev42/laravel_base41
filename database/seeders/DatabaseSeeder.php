<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // запуск сидера: php artisan db:seed

        // запуск фабрики CategoryFactory через модель
        Category::factory(3)->create();

        // запуск фабрики TagFactory через модель
        $tags = Tag::factory(5)->create();

        // запуск фабрики PostFactory через модель
        $posts = Post::factory(6)->create();

        foreach ($posts as $post) {
            // получим id, 3-x рандомных тега, из созданных фабрикой
            $tagsIds = $tags->random(3)->pluck('id');

            // привязка 'id' тегов к посту, через промежуточную таблицу
            $post->tags()->attach($tagsIds);
        }
    }
}
