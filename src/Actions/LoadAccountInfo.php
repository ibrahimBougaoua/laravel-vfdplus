<?php

namespace IbrahimBougaoua\LaravelVfdplus\Actions;

use GuzzleHttp\Client;

class LoadAccountInfo
{
    public $data = [];
    public $response = [];

    public function initData( ... $args )
    {
        $this->data["track_by"] = $args[0];
        $this->data["track_key"] = $args[1];
    }

    public function loadInfo()
    {
        $client = new Client();
    
        $response = $client->get(
            config('vfdplus.home') . config('vfdplus.account_info'), 
            [
                'headers' => [
                    'VFDPLUS-API-KEY' => config('vfdplus.vfdplus_api_key'),
                    'Accept' => 'application/json',
                ],
                'json' => $this->data,
            ]
        );
    
        $this->response = json_decode($response->getBody()->getContents(), true);
    }

    public function getResponse()
    {
        return $this->response;
    }
}