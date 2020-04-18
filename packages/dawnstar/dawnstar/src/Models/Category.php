<?php

namespace Dawnstar\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public $timestamps = true;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order',
        'status',
        'name',
        'slug',
        'detail',
        'color',
        'cover',
    ];

    public function tags() {
        return $this->hasMany(Tag::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class);
    }

    public function getUrlAttribute() {
        return route('category.detail', ['slug' => $this->slug]);
    }
}
