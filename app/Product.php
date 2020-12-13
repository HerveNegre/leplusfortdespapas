<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'slug', 'details', 'description', 'category_id', 'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getStarRating()
    {
        $count = $this->comments->count();
        if ( empty($count)) {
            return 0;
        }
        $starSum = $this->comments()->sum('rating');
        $average = $starSum/$count;

        return $average;
    }
}