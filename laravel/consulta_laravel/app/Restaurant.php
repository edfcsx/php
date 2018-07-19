<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model{

    protected $fillable = ['name','description','address'];

    public function menus(){

        return $this->hasMany(Menu::class);
    }

    //conectando com padrao fora da convenção
    public function owner(){
        $this->belongsTo(User::class);
    }

    public function photos(){
        return $this->hasMany(RestaurantPhoto::class);
    }
}


