<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // een item kan in meerdere winkelmandjes zitten
    public function cart(){
        return $this->belongsToMany('App\Models\Cart');
    }
}
