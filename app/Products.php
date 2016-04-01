<?php

namespace App;
use DB;
use App\Exceptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Validation\ValidatesRequests;
class Products extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category_Products');
    }
    public function parameters()
    {
        return $this->hasMany('App\Parameters', 'id_product');
    }


}
