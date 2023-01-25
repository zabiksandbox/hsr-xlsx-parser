<?php

namespace Hsr\Microservice;

use Hsr\Microservice\ApiBase;

class Xlsxtojson extends ApiBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function post($filepath, $options = [])
    {
        $url = "parser/xlsx";
        $response = $this->multipart($url, $filepath, $options);
        return $response;
    }

    public function parse($filepath, $options = [])
    {
        $url = "parser/xlsx";
        $options['filepath'] = $filepath;
        $response = $this->get($url, $options);
        return $response;
    }
}
