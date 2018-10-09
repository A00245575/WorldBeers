<?php
require 'Slim/Slim.php';
require 'database.php';
require 'beer_db.php';
require 'user_db.php';

use Slim\Slim;
\Slim\Slim::registerAutoloader();

$app = new Slim();
$app->get('/users', 'getUsers');
$app->post('/users', 'addUser');
$app->put('/users', 'updateUser');
$app->delete('/users', 'deleteUser');
$app->get('/users/:id', 'getUserById');
$app->get('/users/search/:query', 'getUserByName');

$app->get('/beers', 'getBeers');
$app->post('/beers', 'addBeer');
$app->put('/beers', 'updateBeer');
$app->delete('/beers', 'deleteBeer');
$app->get('/beers/:id', 'getBeerById');
$app->get('/beers/search/:query', 'getBeerByName');
$app->run();
?>