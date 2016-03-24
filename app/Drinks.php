<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drinks extends Model
{
    public function category(){
        return $this->belongsTo('App\Category_Products');
    }
}
