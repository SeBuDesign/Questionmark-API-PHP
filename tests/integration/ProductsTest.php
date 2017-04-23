<?php namespace SeBuDesign\TheQuestionmark\Tests;

use SeBuDesign\TheQuestionmark\Client;

class ProductsTest extends TestCase
{
    /** @test */
    public function it_should_get_20_products_by_default()
    {
        $products = $this->theQuestionmarkClient->getProducts();

        $this->assertArrayHasKey('products', $products);
        $this->assertArrayHasKey('total', $products);
        $this->assertCount(20, $products[ 'products' ]);
    }


    /** @test */
    public function it_should_get_40_products()
    {
        $products = $this->theQuestionmarkClient->getProducts(
            [
                'per_page' => 40
            ]
        );

        $this->assertArrayHasKey('products', $products);
        $this->assertArrayHasKey('total', $products);
        $this->assertCount(40, $products[ 'products' ]);
    }

    /** @test */
    public function it_should_get_a_product_by_id()
    {
        $product = $this->theQuestionmarkClient->getProduct(123);

        $this->assertArrayHasKey('id', $product);
        $this->assertEquals(123, $product['id']);
    }
}