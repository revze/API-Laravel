<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Airport;
use App\Http\Controllers\APIController as API;

class Reservasi extends Controller
{
    public function flight()
    {
      $airport = Airport::all();
      return view('master.flight',['airport'=>$airport]);
    }
}
