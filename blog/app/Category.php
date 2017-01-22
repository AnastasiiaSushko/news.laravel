<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles()
    {
        return $this->belongsToMany('App\Article');
    }

    public function lastArticles($count = 5)
    {
        return $this->articles()->take($count)->orderBy('id', 'desc')->get();
    }
}
