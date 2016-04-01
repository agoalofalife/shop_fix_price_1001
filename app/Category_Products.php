<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Products extends Model
{
    public function attributes()
    {
        return $this->hasMany('App\Category_Attributes','id_category');
    }
    public function products()
    {
        return $this->hasMany('App\Products','id_catalog');
    }

}
