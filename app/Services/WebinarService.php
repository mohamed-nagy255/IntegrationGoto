<?php

namespace App\Services;

use GuzzleHttp\Client;

class WebinarService
{
    protected $client;
    protected $apiKey;
    
    public function __construct()
    {
        $client = env('GOTO_APP_KEY');
        $apiKey = env('GOTO_APP_SECRET');
        $this->client = new Client([
            'base_uri' => 'https://api.getgo.com/',
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);
    }
    
    public function getWebinars()
    {
        $response = $this->client->get('G2W/rest/v2/organizers/{organizerKey}/webinars');
        return json_decode($response->getBody()->getContents(), true);
    }
}
