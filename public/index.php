<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Todo\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "PostController@index");
$router->get('/api', "PostController@getResponse");
$router->get('/creation', "PostController@creation");

$router->post('/create', "PostController@create");

$router->run();
