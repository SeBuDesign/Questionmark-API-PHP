<?php namespace SeBuDesign\TheQuestionmark\Tests;

use SeBuDesign\TheQuestionmark\Exceptions\ProductNotFoundException;

class ProductsTest extends TestCase
{
    protected $productId = 288247;

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
        $product = $this->theQuestionmarkClient->getProduct($this->productId);

        $this->assertArrayHasKey('id', $product);
        $this->assertEquals($this->productId, $product['id']);
    }

    /** @test */
    public function it_should_throw_an_exception_when_a_product_is_not_found()
    {
        $this->expectException(ProductNotFoundException::class);

        $this->theQuestionmarkClient->getProduct(123);
    }

    /** @test */
    public function it_should_get_a_product_by_a_barcode()
    {
        $product = $this->theQuestionmarkClient->getProductByBarcode($this->productId);

        $this->assertArrayHasKey('id', $product);
        $this->assertEquals($this->productId, $product['id']);
    }

    /** @test */
    public function it_should_throw_an_exception_when_a_product_by_a_barcode_is_not_found()
    {
        $this->expectException(ProductNotFoundException::class);

        $this->theQuestionmarkClient->getProductByBarcode(123);
    }

    /** @test */
    public function it_should_get_20_product_alternatives_by_default()
    {
        $products = $this->theQuestionmarkClient->getProductAlternatives($this->productId);

        $this->assertArrayHasKey('products', $products);
        $this->assertArrayHasKey('total', $products);
        $this->assertCount(20, $products[ 'products' ]);
    }


    /** @test */
    public function it_should_get_40_product_alternatives()
    {
        $products = $this->theQuestionmarkClient->getProductAlternatives(
            $this->productId,
            [
                'per_page' => 10
            ]
        );

        $this->assertArrayHasKey('products', $products);
        $this->assertArrayHasKey('total', $products);
        $this->assertCount(10, $products[ 'products' ]);
    }
}