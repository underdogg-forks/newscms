<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Categories
 *
 * @property integer $id
 * @property string $name
 * @property string $header_image
 * @property string $description
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Posts[] $posts
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereHeaderImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Categories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'header_image', 'description', 'slug'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function posts()
    {
        return $this->hasMany('App\Posts', 'category_id', 'id');
    }
}
