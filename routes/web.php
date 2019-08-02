<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return redirect('deportes/swagger-demo');
});

$router->get('/deportes/blogs', 'BlogsController@index');
$router->post('/deportes/blogs', 'BlogsController@store');
$router->put('/deportes/blogs/{id}', 'BlogsController@update');
$router->delete('/deportes/blogs/{id}', 'BlogsController@destroy');