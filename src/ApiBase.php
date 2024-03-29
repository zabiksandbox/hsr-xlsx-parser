<?php

namespace Hsr\Microservice;

use \GuzzleHttp\Psr7\Utils;

abstract class ApiBase
{
    public $client;

    private $settings;

    public function __construct()
    {
        $this->settings = new XlsxtojsonSettings();

        $this->client = new \GuzzleHttp\Client([
            "base_uri" => $this->settings->MICROSERVICE_URI,
            "timeout" => $this->settings->TIMEOUT_SEC,
            "verify" =>  $this->settings->CACERT_PEM == "false" ? false : $this->settings->CACERT_PEM,
        ]);
    }

    protected function get($url, $query = [])
    {
        $response = $this->client->get($url, ["query" => $query]);        
        return json_decode($response->getBody(), true);
    }

    protected function post($url, $data)
    {
        $response = $this->client->post($url, [
            "json" => $data
        ]);
        return json_decode($response->getBody(), true);
    }

    protected function multipart($url, $filepath, $options)
    {
        if (file_exists($filepath)) {
            $multipart = [
                'headers' => [
                    "Content-Type" => "multipart/form-data",
                    "Accept" => "application/json",
                ],
                'multipart' => [
                    [
                        'name'      => 'file',
                        'filename'  => basename($filepath),
                        'contents'  => \GuzzleHttp\Psr7\Utils::tryFopen($filepath, 'r')
                    ]
                ],
            ];

            if ($this->settings->CACERT_KEY != "false") {
                $multipart['cert'] = [$this->settings->CACERT_KEY, $this->settings->CACERT_KEY_PASSPHRASE];
            }

            foreach($options as $key => $value) {
                $multipart['multipart'][] = [
                    'name' => $key,
                    'contents' => $value,
                ];    
            }

            $response = $this->client->request('POST', $url, $multipart);

            return json_decode($response->getBody(), true);
        } else {
            return [
                'success' => false,
                'data' => "File not found (".$filepath.")",
            ];
        }
    }
}
