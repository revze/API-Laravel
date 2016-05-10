<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';

    public function country()
    {
      return $this->hasOne('App\Country');
    }
}
