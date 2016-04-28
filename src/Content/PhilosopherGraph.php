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
        if (isset($details['itemListElement'][0]['result'])) {
            $this->information = $details['itemListElement'][0]['result']['detailedDescription']['articleBody'];
            $this->imageUrl = $details['itemListElement'][0]['result']['image']['contentUrl'];
            $this->detailsUrl = $details['itemListElement'][0]['result']['detailedDescription']['url'];
        } else {
            $this->information = "Couldn't find information in Knowledge Graph";
            $this->imageUrl = "Couldn't find information in Knowledge Graph";
            $this->detailsUrl = "Couldn't find information in Knowledge Graph";
        }

    }

    /**
     * @return mixed
     */
    public function getInformation()
    {
        return $this->information;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return mixed
     */
    public function getDetailsUrl()
    {
        return $this->detailsUrl;
    }


}