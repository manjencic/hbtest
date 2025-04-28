<?php

namespace infra\Weclapp\Client;

use infra\Weclapp\DTO\Contract;
use GuzzleHttp\Client;

class Weclapp {

    public function getContract(int $entityId): Contract
    {
        $client = new Client();

        $response = $client->request(
            'GET', env('WECLAPP_URL') . '/webapp/api/v1/contract/id/' . $entityId,
            [
                'headers' => [
                    'AuthenticationToken' => env('WECLAPP_TOKEN')
                ]
            ]
        );

        $body = $response->getBody();
        $data = json_decode($body, true);

        $contact = new Contract($entityId, $data['description']);
        return $contact;
    }

    public function updateContract(int $entityId, $description): bool
    {
        $client = new Client();

        $response = $client->request(
            'GET', env('WECLAPP_URL') . '/webapp/api/v1/contract/id/' . $entityId,
            [
                'headers' => [
                    'AuthenticationToken' => env('WECLAPP_TOKEN')
                ]
            ]
        );

        $body = $response->getBody();
        $data = json_decode($body, true);
        $data['description'] = $description;

        $response = $client->request(
            'PUT',
            env('WECLAPP_URL') . '/webapp/api/v1/contract/id/' . $entityId,
            [
                'headers' => [
                    'AuthenticationToken' => env('WECLAPP_TOKEN'),
                    'Content-Type' => 'application/json',
                ],
                'json' => $data
            ]
        );

        return $response->getStatusCode();
    }
}
