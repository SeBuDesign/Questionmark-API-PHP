<?php namespace SeBuDesign\TheQuestionmark\Tests;

use Faker\Factory;
use Faker\Generator;
use SeBuDesign\TheQuestionmark\Client;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * The faker object
     *
     * @var Generator
     */
    protected $faker;

    /**
     * The questionmark client
     *
     * @var Client
     */
    protected $theQuestionmarkClient;

    /**
     * TestCase constructor.
     */
    public function __construct()
    {
        parent::__construct();

        // Initialise faker library
        $this->faker = Factory::create();

        // Initialise the questionmark client
        $this->theQuestionmarkClient = new Client();
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