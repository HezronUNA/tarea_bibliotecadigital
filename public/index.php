<?php

// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define base path
define('BASE_PATH', dirname(__DIR__));

// Autoload
require BASE_PATH . '/vendor/autoload.php';

// Load helpers
require BASE_PATH . '/app/Support/helpers.php';

// Use statements
use App\Router;
use App\Controllers\HomeController;
use App\Controllers\BooksController;
use App\Controllers\AuthorsController;
use App\Controllers\PublishersController;

// Create router
$router = new Router();

// Define routes
$router->get('/', HomeController::class, 'index');

// Books routes
$router->get('/books', BooksController::class, 'index');
$router->get('/books/{id}', BooksController::class, 'show');

// Authors routes
$router->get('/authors', AuthorsController::class, 'index');
$router->get('/authors/{id}', AuthorsController::class, 'show');

// Publishers routes
$router->get('/publishers', PublishersController::class, 'index');
$router->get('/publishers/{id}', PublishersController::class, 'show');

// Dispatch
$response = $router->dispatch();
echo $response;
