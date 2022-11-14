<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // een winkelmandje heeft meerdere items
    public function item(){
        return $this->hasMany('App\Models\Item');
    }

    // een winkelmandje hoort tot één user
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
