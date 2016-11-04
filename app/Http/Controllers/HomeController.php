<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Currency;
use App\Lang;
use App\Country;
use App\Airport;
use App\Http\Controllers\APIController as API;

class HomeController extends Controller
{
    public function index()
    {
      return redirect('master/currency');
    }
    
    public function getCurrency()
    {
      $api = new API;
      $hasil = $api->getCurl('general_api/listCurrency');
      Currency::whereRaw('id>0')->delete();
      $data = [];
      foreach ($hasil->result as $key) {
        $curr = new Currency;
        $curr->code = $key->code;
        $curr->name = $key->name;
        $curr->save();
        $data['id'][$curr->id] = $key->code;
      }

      return redirect('master/currency');
    }

    public function currency()
    {
      $currency = Currency::all();
      return view('master.currency',['currency'=>$currency]);
    }

    public function getLang()
    {
      $api = new API;
      $hasil = $api->getCurl('general_api/listLanguage');
      Lang::whereRaw('id>0')->delete();
      $data = [];
      foreach ($hasil->result as $key) {
        $lang = new Lang;
        $lang->code = $key->code;
        $lang->name_long = $key->name_long;
        $lang->name_short = $key->name_short;
        $lang->save();
        $data['id'][$lang->id] = $key->code;
      }

      return redirect('master/lang');
    }

    public function lang()
    {
      $lang = Lang::all();
      return view('master.lang',['lang'=>$lang]);
    }

    public function getCountry()
    {
      $api = new API;
      $hasil = $api->getCurl('general_api/listCountry');
      Country::whereRaw('id>0')->delete();
      $data = [];
      foreach ($hasil->listCountry as $key) {
        $country = new Country;
        $country->country_id = $key->country_id;
        $country->country_name = $key->country_name;
        $country->country_areacode = $key->country_areacode;
        $country->save();
        $data['id'][$country->id] = $key->country_id;
      }

      return redirect('master/country');
    }

    public function country()
    {
      $country = Country::all();
      return view('master.country',['country'=>$country]);
    }

    public function airport()
    {
      $airports = Airport::all();
      return view('master.airport',['airports'=>$airports]);
    }

    public function getAirport()
    {
      $api = new API;
      $hasil = $api->getCurl('flight_api/all_airport');
      Airport::whereRaw('id>0')->delete();
      $data = [];
      foreach ($hasil->all_airport->airport as $key) {
        $airport = new Airport;
        $airport->airport_name = $key->airport_name;
        $airport->airport_code = $key->airport_code;
        $airport->location_name = $key->location_name;
        $airport->country_id = $key->country_id;
        $airport->save();
        $data['id'][$airport->id] = $key->country_id;
      }

      return redirect('master/airport');
    }
}
