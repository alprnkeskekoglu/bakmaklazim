<?php

namespace Dawnstar\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id',
        'status',
        'useful',
        'read_status',
        'user_ip',
        'user_agent',
        'user_name',
        'user_email',
        'detail',
    ];

    public function blog() {
        return $this->belongsTo(Blog::class);
    }

}
