<?php

namespace Tests\Functional;

class UsersApiTest extends BaseTestCase
{
    /**
     * Test that the index route returns a rendered response containing the text 'SlimFramework' but not a greeting
     */
    public function testGetAllUsersApiEndpoint()
    {
        $response = $this->runApp('GET', '/api/v1/users');

        $this->assertEquals(200, $response->getStatusCode());
    }

}