<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['titre','contenu','user_id','resolv','url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}