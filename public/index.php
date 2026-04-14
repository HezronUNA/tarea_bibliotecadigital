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
use Database\Database;
use App\Controllers\HomeController;
use App\Controllers\BooksController;
use App\Controllers\AuthorsController;
use App\Controllers\PublishersController;
use App\Controllers\InitController;

// Inicializar base de datos una sola vez
$db = Database::getInstance();

// Create router
$router = new Router();

// Define routes
$router->get('/init', InitController::class, 'init');
$router->get('/', HomeController::class, 'index');

// Books routes
$router->get('/books', BooksController::class, 'index');
$router->get('/books/create', BooksController::class, 'create');
$router->post('/books', BooksController::class, 'store');
$router->get('/books/{id}/edit', BooksController::class, 'edit');
$router->put('/books/{id}', BooksController::class, 'update');

// Authors routes
$router->get('/authors', AuthorsController::class, 'index');
$router->get('/authors/create', AuthorsController::class, 'create');
$router->post('/authors', AuthorsController::class, 'store');
$router->get('/authors/{id}/edit', AuthorsController::class, 'edit');
$router->put('/authors/{id}', AuthorsController::class, 'update');

// Publishers routes
$router->get('/publishers', PublishersController::class, 'index');
$router->get('/publishers/create', PublishersController::class, 'create');
$router->post('/publishers', PublishersController::class, 'store');
$router->get('/publishers/{id}/edit', PublishersController::class, 'edit');
$router->put('/publishers/{id}', PublishersController::class, 'update');

// Dispatch
$response = $router->dispatch();
echo $response;
