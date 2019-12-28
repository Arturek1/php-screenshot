<?php

namespace Arturek1\Screenshot;

use GuzzleHttp\Client;

class Screenshot
{
    private $key;
    private $client;

    function __construct($key)
    {
        $this->key = $key;
        $this->client = new Client(['base_uri' => 'https://www.googleapis.com/pagespeedonline/v5/']);
    }

    public function get($url)
    {
        $google_api_url = "runPagespeed?url=$url&key=$this->key&screenshot=true";
        $response = $this->client->request('GET', $google_api_url);
        $data = json_decode((string) $response->getBody(), true);
        $base64 = $data['lighthouseResult']['audits']['final-screenshot']['details']['data'];
        return $base64;
    }
}