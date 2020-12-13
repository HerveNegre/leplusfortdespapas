<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'phone', 'email', 'delivery_street',
        'delivery_street2', 'delivery_zip_code', 'delivery_city', 'delivery_country', 
        'bill_street', 'bill_street2', 'bill_zip_code', 'bill_city', 'bill_city', 'bill_country'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }
}