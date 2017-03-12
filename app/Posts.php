<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Posts
 *
 * @property integer $id
 * @property string $slug
 * @property string $title
 * @property string $header_image
 * @property string $content
 * @property integer $user_id
 * @property integer $category_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @property-read \App\Categories $category
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereHeaderImage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts whereDeletedAt($value)
 * @mixin \Eloquent
 * @property string $published_at
 * @method static \Illuminate\Database\Query\Builder|\App\Posts wherePublishedAt($value)
 * @property-read \App\User $author
 */
class Posts extends Model
{
    use SoftDeletes;
    
    protected $table = 'posts';
    protected $fillable = ['slug', 'title', 'header_image', 'content', 'user_id', 'category_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Categories');
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
