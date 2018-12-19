<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memo extends Model
{
    /**
     * 検索フィルター
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return void
     */
    public function scopeFilter($query)
    {
        $query->when(request('search', false), function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('contents', 'like', '%' . $search . '%');
        });
    }
}
