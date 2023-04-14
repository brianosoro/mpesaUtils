<?php 

use SymatechLabs\Http\CurlHandler as CurlHandler;
use SymatechLabs\Mpesa\MpesaConfig as MpesaConfig;

use SymatechLabs\Config as Config;

require_once '../vendor/autoload.php';


$messageParams = array(

							    "ShortCode" => "",
							    "ResponseType" => "",
							    "ConfirmationURL" => "",
							    "ValidationURL" => ""

        );



$mpesaConfig = new MpesaConfig();



$curl = new CurlHandler($messageParams, $mpesaConfig);


echo $mpesaConfig->getAccessToken($curl);

echo $mpesaConfig->registerURL($curl, "ENTER_ACCESS_TOKEN");







?>