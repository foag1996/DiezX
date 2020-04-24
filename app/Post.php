<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//definir los datos permitidos para el crud de la tabla post
    protected $fillable = [
        'title', 'url', 'excerpt', 'body', 'estatus', 'user_id', 
    ];

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'url';
    }


}
