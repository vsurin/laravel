<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	public $table = "post";
	public $timestamps = false;	

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'image', 'id_category'
    ];

    /**
     * Get the category record associated with the post.
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'id_category', 'id');
    }      
}
