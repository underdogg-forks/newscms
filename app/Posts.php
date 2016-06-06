<?php

namespace NewsCMS;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected $fillable = ['slug', 'title', 'header_image', 'content', 'user_id', 'category_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo('NewsCMS\Categories');
    }
}
