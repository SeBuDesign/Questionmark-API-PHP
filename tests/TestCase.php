<?php namespace SeBuDesign\TheQuestionmark\Tests;

use Faker\Factory;
use Faker\Generator;
use Dotenv\Dotenv;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * The facker object
     *
     * @var Generator
     */
    protected $faker;

    public function __construct()
    {
        parent::__construct();

        // Initialise faker library
        $this->faker = Factory::create();

        // Load test configuration
//        $dotEnv = new Dotenv(__DIR__);
//        $dotEnv->load();
    }

    /**
     * Set a protected property public to test it's value
     *
     * @param object $object   The object to check
     * @param string $property The protected property
     *
     * @return mixed
     */
    protected function accessProtectedProperty($object, $property)
    {
        $reflection = new \ReflectionClass($object);

        $property = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}