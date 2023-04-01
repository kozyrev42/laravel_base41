<?php

namespace App\Models\Traits;

use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    /*
     * @params Builder $builder
     * @params params
     *
     * @return
     *
     * вызыв функции scopeFilter будет следующим - filter()
     */
    public function scopeFilter (Builder $builder, FilterInterface $filter)
    {
        $filter->apply($builder);

        return $builder;
    }
}
