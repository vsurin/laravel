<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $table = "category";
	public $timestamps = false;	

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];
}
