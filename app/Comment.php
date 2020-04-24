<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	//definir los datos permitidos para el crud de la tabla comments
    protected $fillable = [
        'body', 'post_id', 'user_id', 
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
