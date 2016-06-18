<?php

namespace NewsCMS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * NewsCMS\Posts
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
 * @property-read \NewsCMS\Categories $category
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereHeaderImage($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts whereDeletedAt($value)
 * @mixin \Eloquent
 * @property string $published_at
 * @method static \Illuminate\Database\Query\Builder|\NewsCMS\Posts wherePublishedAt($value)
 */
class Posts extends Model
{
    use SoftDeletes;
    
    protected $table = 'posts';
    protected $fillable = ['slug', 'title', 'header_image', 'content', 'user_id', 'category_id'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo('NewsCMS\Categories');
    }
}
