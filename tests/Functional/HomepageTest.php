<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testMainRoute()
    {
        $response = $this->runApp('get', '/api/v1/users');

        echo "<pre>";
        print_r($response->getHeaders());
        echo "</pre>";
    }
}