<?php namespace SeBuDesign\TheQuestionmark\Endpoints;

use SeBuDesign\TheQuestionmark\Exceptions\ProductNotFoundException;

trait Products
{
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
     * Get the products per 20 by default
     *
     * @param integer $productId The product id to retrieve
     * @param array $requestParameters The amount of products per page
     *
     * @return array | null
     */
    public function getProductAlternatives($productId, $requestParameters = [])
    {
        if (!isset($requestParameters['per_page'])) {
            $requestParameters['per_page'] = 20;
        }

        return $this->formatResponse(
            $this->httpClient->get(
                "products/{$productId}/alternatives", // URI endpoint
                [
                    'query' => $requestParameters
                ]
            )
        );
    }

    /**
     * Retrieve a single product by an id or a barcode
     *
     * @param integer $productIdOrBarcode The product id or barcode to retrieve
     *
     * @throws ProductNotFoundException
     *
     * @return array | null
     */
    public function getProduct($productIdOrBarcode)
    {
        try {
            $product = $this->formatResponse(
                $this->httpClient->get(
                    "products/{$productIdOrBarcode}" // URI endpoint
                )
            );
        } catch (\Exception $exception) {
            throw new ProductNotFoundException("Product not found", 404);
        }

        return $product;
    }

    /**
     * Retrieve a single product by a barcode
     *
     * @param integer | string $barcode The barcode of the product to retrieve
     *
     * @throws ProductNotFoundException
     *
     * @return array | null
     */
    public function getProductByBarcode($barcode)
    {
        return $this->getProduct($barcode);
    }
}