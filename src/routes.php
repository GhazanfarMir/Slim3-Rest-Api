<?php

// Routes
use Slim\Http\Request;
use Slim\Http\Response;

// example home route
$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->group('/api', function () use ($app) {
    $app->group('/v1', function () use ($app) {
        $app->get('/users', 'App\Controllers\UsersController:all');
        $app->get('/users/{id}', 'App\Controllers\UsersController:get');
        $app->post('/users', 'App\Controllers\UsersController:add');
        $app->put('/users/{id}', 'App\Controllers\UsersController:update');
        $app->delete('/users/{id}', 'App\Controllers\UsersController:delete');
    });
});
