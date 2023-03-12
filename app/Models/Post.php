<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    // явное указание таблицы, с которой связана Модель
    protected $table = 'posts';

    // разрешаем запись в бд
    protected $guarded = [];

    public function category()
    {
        // связываем модель Category с этой моделью, указываем какими ключами связанны
        // поле связи 'category_id' находится в таблиице 'posts', значит "Пост" принадлежит "Категории"
        return $this->belongsTo(Category::class, 'category_id','id');
    }

    public function tags()
    {
        // каждый Пост, принадлежит многим Тегам, прописываем таблицу, и поля в ней, по которым происходит связывание данных
        return $this->belongsToMany(Tag::class, 'post_tags','post_id', 'tag_id');
    }
}
