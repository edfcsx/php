<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPhoto extends Model
{
    protected $table = 'restaurant_photos';

    protected $fillable = ['photo'];

    public function restaurant(){
        $this->belongsTo(Restaurant::class);
    }
}
