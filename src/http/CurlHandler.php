<?php  namespace SymatechLabs\Http;

use SymatechLabs\Mpesa\MpesaConfig as MpesaConfig;
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

class CurlHandler
{



	private $curl;

	public $response;

	private $requestParams = array();


	private $mpesaConfig;

	public function __construct( array $requestParams, MpesaConfig $mpesaConfig){

	  
	   $this->requestParams = $requestParams;
	   $this->mpesaConfig = $mpesaConfig;

	}




	public function sendRequest($accessToken = null, $requestType /*POST,GET,PUT*/, $authorizationType ){


	 	$this->curl = curl_init();
	    curl_setopt($this->curl, CURLOPT_URL, Config::BASE_URL.$this->mpesaConfig->urlPath);
	
	   	curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
	
	  	if($requestType == "POST"){ 
		   	curl_setopt($this->curl, CURLOPT_POST, true);
		    curl_setopt($this->curl, CURLOPT_POSTFIELDS, json_encode($this->requestParams));
	  	}

     	curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
            $authorizationType . $accessToken,
            'Content-Type: application/json'
        ));
		$this->response = curl_exec($this->curl);	
		curl_close($this->curl);
		return $this->response;

	}




}



?>