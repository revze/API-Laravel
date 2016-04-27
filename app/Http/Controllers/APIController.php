<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class APIController extends Controller
{
    public $token;

    public function __construct()
    {
      $this->getToken();
    }

    public function getToken()
    {
      Session::put('token','');
      if (session('token')=='') {
        $URL = env(env('API_ENV'));
        $curl = new \Curl\Curl();
        $curl->setUserAgent('twh:22599909;Revando Corporation;');
        $curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
        $curl->get($URL."apiv1/payexpress",[
          'method'  =>  'getToken',
          'secretkey' =>  env(env('API_KEY')),
          'output'  =>  'json'
        ]);

        if ($curl->error) {
          Session::put('token','');
          die('Error:'.$curl->error_code);
        }
        else {
          $json = json_decode($curl->response);
          $this->token = $json->token;
          Session::put('token',$json->token);
        }
      }

      else {
        $this->token = Session::get('token');
      }
    }

    public function getCurl($endpoint,$data=[])
    {
      $URL = env(env('API_ENV'));
      $curl = new \Curl\Curl();
      $curl->setUserAgent('twh:22599909;Revando Corporation;');
      $curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
      $data+=['output'=>'json','token'=>$this->token];
      $curl->get($URL.$endpoint,$data);

      if ($curl->error) {
        die('Error:'.$curl->error_code);
      }
      else {
        $json = json_decode($curl->response);
        return $json;
      }
    }
}
