<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    //

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function offers(){
        return $this->belongsToMany('App\Offer')->withTimestamps();
    }
}
