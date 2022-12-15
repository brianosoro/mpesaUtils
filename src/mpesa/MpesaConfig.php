<?php  namespace SymatechLabs\Mpesa;

use SymatechLabs\Http\CurlHandler as CurlHandler;
use SymatechLabs\Config as Config;


/*======================================================================
 mpesaUtils
======================================================================
-----------------------------------------------------
Author   : Brian Osoro
Company  : Symatech Labs Ltd
Website  : www.symatechlabs.com
Blog     : www.brianosoro.com
Twitter  : https://twitter.com/OsoroOngera
Email    : brian@symatechlabs.com
--------------------------------------------------------------------------*/


class MpesaConfig
{



    public $accessToken;

    public $urlPath;


    public function __construct( ){

            $this->accessToken = $this->base64();

    }

    public function base64(){

        return base64_encode(Config::CONSUMER_KEY . ':' . Config::CONSUMER_SECRET);

    }


    public function getAccessToken(CurlHandler $curlHandler)
    {
        $this->urlPath = "oauth/v1/generate?grant_type=client_credentials";  
        return $curlHandler->sendRequest($this->base64(), "", "Authorization: Basic ");//json_decode($curlHandler->sendRequest(), true) ['access_token'];

    }
    

    public function registerURL(CurlHandler $curlHandler)
    {
        
        $this->urlPath = "mpesa/c2b/v2/registerurl";    
        return $curlHandler->sendRequest("", "POST", "Authorization: Bearer ");

    }




}



?>