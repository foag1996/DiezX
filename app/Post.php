<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title', 'excerpt', 'body', 'estatus', 'user_id', 
    ];
}
