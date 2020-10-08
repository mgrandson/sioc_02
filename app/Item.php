<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function offers(){
        return $this->belongsToMany(Offer::class)->withTimestamps();
    }
}
