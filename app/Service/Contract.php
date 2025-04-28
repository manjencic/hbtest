<?php

namespace App\Service;

use infra\Weclapp\Client\Weclapp;

class Contract
{
    private $client;

    public function __construct(Weclapp $client) {
        $this->client = $client;
    }

    public function update($id, $description)
    {
        return $this->client->updateContract($id, $description);
    }
}
