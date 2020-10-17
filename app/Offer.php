<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    public function items()
    {
        return $this->belongsToMany(Item::class)->withTimestamps();
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
