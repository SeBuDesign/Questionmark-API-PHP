<?php namespace SeBuDesign\TheQuestionmark;

use Psr\Http\Message\ResponseInterface;
use SeBuDesign\TheQuestionmark\Endpoints;

class Client
{
    /**
     * The HTTP client to connect to api-c.thequestionmark.org
     *
     * @var \GuzzleHttp\Client
     */
    protected $httpClient;

    /**
     * Client constructor.
     */
    public function __construct()
    {
        // Setup the HTTP client with a base url
        $this->httpClient = new \GuzzleHttp\Client(
            [
                'base_uri' => 'https://api-c.thequestionmark.org/api/v1.1/',
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]
        );
    }

    use Endpoints\Products;

    /**
     * JSON decode the response and return it
     *
     * @param ResponseInterface $response The response of the API request
     *
     * @return mixed
     */
    protected function formatResponse($response)
    {
        return json_decode(
            $response->getBody()->getContents(),
            true // Assoc
        );
    }
}