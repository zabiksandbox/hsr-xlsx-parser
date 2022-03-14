<?php

namespace Hsr\Microservice;

class XlsxtojsonSettings
{
	public $TIMEOUT_SEC;
	public $CACERT_PEM;
	public $CACERT_KEY;
	public $CACERT_KEY_PASSPHRASE;
	public $API_KEY;

	public function __construct(){
		$dotenv = new \Symfony\Component\Dotenv\Dotenv();

		$rootDir = __DIR__.'/../../../../';

		$dotenv = \Dotenv\Dotenv::createImmutable($rootDir);
		$dotenv->safeLoad();
		
        $this->MICROSERVICE_URI 		= isset($_ENV['HSR_MICROSERVICE_URI']) ? $_ENV['HSR_MICROSERVICE_URI'] : 30;
        $this->TIMEOUT_SEC 				= isset($_ENV['HSR_MICROSERVICE_TIMEOUT_SEC']) ? $_ENV['HSR_MICROSERVICE_TIMEOUT_SEC'] : 30;
	    $this->CACERT_PEM 				= isset($_ENV['HSR_MICROSERVICE_CACERT_PEM']) ? $_ENV['HSR_MICROSERVICE_CACERT_PEM'] : false;
	    $this->CACERT_KEY 				= isset($_ENV['HSR_MICROSERVICE_CACERT_KEY']) ? $_ENV['HSR_MICROSERVICE_CACERT_KEY'] : false;
	    $this->CACERT_KEY_PASSPHRASE 	= isset($_ENV['HSR_MICROSERVICE_CACERT_KEY_PASSPHRASE']) ? $_ENV['HSR_MICROSERVICE_CACERT_KEY_PASSPHRASE'] : '';        
	}
    
}
