<?php namespace SeBuDesign\TheQuestionmark;

use Psr\Http\Message\ResponseInterface;

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
                'base_uri' => 'https://api-c.thequestionmark.org/api/v1.1/'
            ]
        );
    }

    /**
     * Get the products per 20 by default
     *
     * @param array $requestParameters The amount of products per page
     *
     * @return array | null
     */
    public function getProducts($requestParameters = [])
    {
        if (!isset($requestParameters['per_page'])) {
            $requestParameters['per_page'] = 20;
        }

        return $this->formatResponse(
            $this->httpClient->get(
                'products', // URI endpoint
                [
                    'query' => $requestParameters
                ]
            )
        );
    }

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