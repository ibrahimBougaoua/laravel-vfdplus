<?php

namespace IbrahimBougaoua\LaravelVfdplus\Actions;

use GuzzleHttp\Client;

class LoadCredentialInfo
{
    public $response = [];

    public function loadInfo()
    {
        $client = new Client();

        $response = $client->get(
            config('vfdplus.home').config('vfdplus.serial_info'),
            [
                'headers' => [
                    'VFDPLUS-API-KEY' => config('vfdplus.vfdplus_api_key'),
                    'Accept' => 'application/json',
                ],
            ]
        );

        $this->response = json_decode($response->getBody()->getContents(), true);
    }

    public function getSerialCode()
    {
        return $this->response['msg_data']['serial_code'];
    }

    public function getResponse()
    {
        return $this->response;
    }
}
