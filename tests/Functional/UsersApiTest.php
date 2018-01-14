<?php

namespace Tests\Functional;

class UsersApiTest extends BaseTestCase
{

    /**
     * @test
     */
    public function getUsersEndpoint()
    {
        $response = $this->runApp('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function getUsersCollectionEndpoint()
    {
        $response = $this->runApp('GET', '/api/v1/users');

        $collection = (array) json_decode($response->getBody());

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertJson((string) $response->getBody());

        $this->assertArrayHasKey('total_results', $collection);
    }
}
