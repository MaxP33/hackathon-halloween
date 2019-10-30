<?php


namespace App\Model;

use Symfony\Component\HttpClient\HttpClient;

abstract class AbstractApiManager
{
    const URL = 'https://hackathon-wild-hackoween.herokuapp.com/';

    protected $endpoint;
    protected $client;

    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
        $this->client = HttpClient::create();
    }

    public function selectAll()
    {
        return $this->client->request('GET',self::URL . $this->endpoint)->toArray();
    }

}