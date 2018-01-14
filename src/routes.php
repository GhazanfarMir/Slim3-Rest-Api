<?php

// Routes
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;

// example home route
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/api', function () use ($app) {
    $app->group('/v1', function () use ($app) {

        /**
         * Route GET /api/v1/users
         */
        $app->get('/users', function ($request, $response) {
            $users = User::all();

            // logging within the controller
            $this->logger->info($request->getUri() . " route");

            return $response->withJson([
                'code' => 200,
                'total_results' => $users->count(),
                'data' => $users
            ]);
        });

        /**
         * Route GET /api/v1/users/{id}
         */
        $app->get('/users/{id}', function ($request, $response, $args) {
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
        });

        /**
         * Route POST /api/v1/users
         */
        $app->post('/users', function ($request, $response) {
            try {
                $this->logger->info("Creating a new user", ['data' => $request->getParsedBody()]);

                $user = (new User)->addUser($request);

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
        });

        /**
         * Route PUT /api/v1/users/{id}
         */
        $app->put('/users/{id}', function ($request, $response, $args) {
            try {
                $this->logger->info("Updating an existing user", ['id' => $args['id']]);

                $user = (new User)->updateUpdate($request, $args);

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
        });

        /**
         * Route DELETE /api/v1/users/{id}
         */

        $app->delete('/users/{id}', function ($request, $response, $args) {
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
        });
    });
});
