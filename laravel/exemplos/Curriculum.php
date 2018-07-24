<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = 'curriculum';

    protected $fillable = ['file','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
