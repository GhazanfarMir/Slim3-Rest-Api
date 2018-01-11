<?php

namespace App\Controllers;

use App\Models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class UsersController
{

    /**
     * @var
     */
    private $logger;


    /**
     * UsersController constructor.
     * @param $logger
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param $request
     * @param $response
     * @return mixed
     */
    public function all(Request $request, Response $response)
    {
        $users = User::all();

        // logging within the controller
        $this->logger->info($request->getUri() . " route");

        return $response->withJson([
            'code' => 200,
            'total_results' => $users->count(),
            'data' => $users
        ]);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function get(Request $request, Response $response, $args)
    {
        $user = User::find($args['id']);

        if ($user) {
            return $response->withJson([
                'code' => 200,
                'data' => $user
            ], 200);
        }

        return $response->withJson([
            'code' => '404',
            'message' => 'no user found'
        ], 404);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function add(Request $request, Response $response)
    {
        try {
            $this->logger->info("Creating a new user", ['data' => $request->getParsedBody()]);

            $user = (new User)->add($request);

            if ($user) {
                return $response->withJson([
                    'code' => 201,
                    'message' => 'New user added successfully.',
                    'data' => $user
                ], 201);
            }

            return $response->withJson([
                'code' => 400,
                'message' => 'There were some problems with the data provided.',
            ], 400);
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function update(Request $request, Response $response, $args)
    {
        try {
            $this->logger->info("Updating an existing user", ['id' => $args['id']]);

            $user = (new User)->update($request, $args);

            if ($user) {
                return $response->withJson([
                    'code' => 200,
                    'message' => 'User has been updated successfully.',
                    'data' => $user
                ], 200);
            }

            return $response->withJson([
                'code' => 400,
                'message' => 'There were some problems while updating the record.',
            ], 400);
        } catch (\Exception $e) {
        }
    }

    /**
     * @param Request $request
     * @param Response $response
     * @param $args
     * @return mixed
     */
    public function delete(Request $request, Response $response, $args)
    {
        $this->logger->info("Deleting user", ['id' => $args['id']]);

        $user = User::find($args['id']);

        if ($user) {
            $user->delete();

            return $response->withJson([
                'code' => 200,
                'message' => 'User has been deleted successfully.'
            ], 200);
        }

        return $response->withJson([
            'code' => '404',
            'message' => 'no user found'
        ], 404);
    }
}
