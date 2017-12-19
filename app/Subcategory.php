<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    protected $fillable = ['name', 'catid'];

    public function categories()
    {
      return $this->belongsTo('App\Category');
    }
}
