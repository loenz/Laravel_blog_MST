<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";
    protected $primaryKey = "id";
    protected $fillable = [

    	'article_slug',
    	'user_id',
    	'published',
    	'comment'

    ];
    protected $dates = [

    	'created_at',
    	'updated_at'

    ];
}
