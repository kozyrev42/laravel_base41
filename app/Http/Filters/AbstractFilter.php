<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{

    // параметры по которым будем фильтровать
    private $queryParams = [];

    // параметры из запроса, будут получены и сохранены
    public function __construct(array $queryParams)
    {
        // инициализируем переменную во всех создоваемых экземплярах класса
        $this->queryParams = $queryParams;
    }

    // вызов абстрактного метода, который описан в дочернем классе
    // метод вернёт массив методов, методы отвечающие за фильтрацию
    abstract protected function getCallbacks(): array;
    // дальше идёт с ними работа
    public function apply(Builder $builder)
    {
        // каждый колБэк раскидываем на Имя-колбэка и сам Колбэк
        foreach ($this->getCallbacks() as $name => $callback) {
            if(isset ($this->queryParams[$name])) {                 // если queryParams, существует с таким-то неймом,
                call_user_func($callback, $builder, $this->queryParams[$name]);  // то вызываем метод $callback, и пракидываем ему $builder и параметр queryParams[$name]
            }
        }
    }
}
