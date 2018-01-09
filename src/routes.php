<?php

// Routes

// example home route
$app->get('/', 'App\Controllers\UsersController:all')->setName('getUsers');

$app->group('/api', function () use ($app) {

    $app->group('/v1', function () use ($app) {
        $app->get('/users', 'App\Controllers\UsersController:all');
        $app->get('/users/{id}', 'App\Controllers\UsersController:get');
        $app->post('/users', 'App\Controllers\UsersController:add');
        $app->put('/users/{id}', 'App\Controllers\UsersController:update');
        $app->delete('/users/{id}', 'App\Controllers\UsersController:delete');
    });
});