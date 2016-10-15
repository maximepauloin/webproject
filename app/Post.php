<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'user_id', 'resolv', 'url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}