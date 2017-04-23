<?php namespace SeBuDesign\TheQuestionmark\Tests;

use SeBuDesign\TheQuestionmark\Client;

class ProductsTest extends TestCase
{
    /** @test */
    public function it_should_get_20_products_by_default()
    {
        $theQuestionMarkEndpoint = new Client();
        $products = $theQuestionMarkEndpoint->getProducts();

        $this->assertArrayHasKey('products', $products);
        $this->assertArrayHasKey('total', $products);
        $this->assertCount(20, $products[ 'products' ]);
    }


    /** @test */
    public function it_should_get_40_products()
    {
        $theQuestionMarkEndpoint = new Client();
        $products = $theQuestionMarkEndpoint->getProducts(
            [
                'per_page' => 40
            ]
        );

        $this->assertArrayHasKey('products', $products);
        $this->assertArrayHasKey('total', $products);
        $this->assertCount(40, $products[ 'products' ]);
    }
}