<?php

namespace App\Http\Controllers\TiketAPI;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        $curl->setUserAgent('twh:22523085;BaseCamp Software;');
        $curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
        $curl->get('https://api-sandbox.tiket.com/apiv1/payexpress',[
          'method'  =>  'getToken',
          'secretkey' =>  '39798ca2d26f38c10d92a17689e2fff7',
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
      $curl->setUserAgent('twh:22523085;BaseCamp Software;');
      $curl->setopt(CURLOPT_SSL_VERIFYPEER, FALSE);
      $data+=['output'=>'json','token'=>$this->token];
      $curl->get('https://api-sandbox.tiket.com/'.$endpoint,$data);
      if ($curl->error) {
        die('Error:'.$curl->error_code);
      }
      else {
        $json = json_decode($curl->response);
        return $json;
      }
    }
}
