<?php

namespace Dawnstar\Models;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $table = 'search_content';

    public function model()
    {
        return $this->morphTo();
    }
}
