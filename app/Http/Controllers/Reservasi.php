<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Airport;
use App\Http\Controllers\APIController as API;
use App\Log;
use App\SearchData;

class Reservasi extends Controller
{
    public function flight()
    {
      $airport = Airport::all();
      return view('master.flight',['airport'=>$airport]);
    }

    public function searchFlight(Request $r)
    {
      $data = [];
      $data['d'] = $r->input('from');
      $data['a'] = $r->input('to');

      $data['date'] = date_format(date_create($r->input('depart_date')),'Y-m-d');

      if ($r->input('type')=='RT') {
        $data['ret_date'] = date_format(date_create($r->input('return_date')),'Y-m-d');
      }

      $data['adult'] = $r->input('adult');
      $data['child'] = $r->input('child');
      $data['infant'] = $r->input('infant');
      $data['v'] = 1;

      $r->session()->put('token','');

      $newapi = new API;

      $log = new Log;
      $log->request = json_encode($data);
      $log->token = $r->session()->get('token');
      $log->save();

      $sd = new SearchData;
      $sd->depart_city = $r->input('from');
      $sd->arrive_city = $r->input('to');
      $sd->depart_date = $data['date'];

      if ($r->input('type')=='RT') {
        $sd->return_date = $data['ret_date'];
      }

      $sd->adult = $r->input('adult');
      $sd->child = $r->input('child');
      $sd->infant = $r->input('infant');
      $sd->ver = $data['v'];
      $sd->token = $r->session()->get('token');
      $sd->save();

      $hasil = $newapi->getCurl('search/flight',$data);

      $sd->result = json_encode($hasil);
      $sd->save();

      $log->response = json_encode($hasil);
      $log->status_code = $hasil->diagnostic->status;
      $log->save();

      return response()->json($hasil);  
    }
}
