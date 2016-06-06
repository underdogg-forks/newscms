<?php

namespace NewsCMS;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'header_image', 'description', 'slug'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function posts()
    {
        return $this->hasMany('NewsCMS\Posts', 'category_id', 'id');
    }
}
