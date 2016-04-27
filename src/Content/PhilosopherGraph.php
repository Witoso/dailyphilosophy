<?php


namespace DailyPhilosophy\Content;

use GuzzleHttp\Client;

class PhilosopherGraph
{
    private $client;
    private $information;
    private $imageUrl;
    private $detailsUrl;
    const API_KEY = 'AIzaSyCtj3la25DtoQIA1WSGxem_lMSO5t2v3V0';

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function downloadInformation(string $name)
    {
        $response = $this->client->request('GET', 'https://kgsearch.googleapis.com/v1/entities:search', [
           'query' => ["limit" => 1, "query" => $name, "key" => PhilosopherGraph::API_KEY]
        ]);
        $details = json_decode($response->getBody(), true);
        $this->information = $details['itemListElement'][0]['result']['detailedDescription']['articleBody'];
        $this->imageUrl = $details['itemListElement'][0]['result']['image']['contentUrl'];
        $this->detailsUrl = $details['itemListElement'][0]['result']['detailedDescription']['url'];
    }
}