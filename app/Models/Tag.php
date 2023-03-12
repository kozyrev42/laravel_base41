<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        // каждый Тег, принадлежит многим Постам, прописываем таблицу, и поля в ней, по которым происходит связывание данных
        return $this->belongsToMany(Post::class, 'post_tags','tag_id', 'post_id');
    }
}
