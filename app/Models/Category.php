<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        // связываем модель Post с этой моделью
        // "Категория"
        return $this->hasMany(Post::class, 'category_id','id');
    }
}
