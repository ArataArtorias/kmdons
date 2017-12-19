<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['name','profile','image_name','image_extension','created_by'];
}
