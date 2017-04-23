<?php namespace SeBuDesign\TheQuestionmark;

class Client
{
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client(
            [
                'base_uri' => 'https://api-c.thequestionmark.org/api/v1.1/'
            ]
        );
    }

    public function getProducts()
    {
        $response = $this->httpClient->get('products?per_page=20');

        return $this->getResponseProperty($response, 'products');
    }

    protected function getResponseProperty($response, $property)
    {
        $decodedResponse = json_decode(
            $response->getBody()->getContents(),
            true // Assoc array
        );

        return (isset($decodedResponse[$property]) ? $decodedResponse[$property] : null);
    }
}