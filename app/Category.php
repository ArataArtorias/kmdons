<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];

    // public function category()
    // {
    //   return $this->belongsTo('App\Category');
    // }
    public function subcategories()
    {
        return $this->hasMany('App\Subcategory','catid','id');
    }
}
