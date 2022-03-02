<?php

namespace HSR\Microservice;

class XlsxtojsonClient
{

    public function __construct()
    {
        $this->XlsxtoJson   = new XlsxtoJson();
    }

    public function postXlsx($filepath, $options = [])
    {
        return $this->XlsxtoJson->post($filepath, $options);
    }

    public function parseXlsx($filepath, $options = [])
    {
        return $this->XlsxtoJson->parse($filepath, $options);
    }
}
