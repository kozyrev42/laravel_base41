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
}
