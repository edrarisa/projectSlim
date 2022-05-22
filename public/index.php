<?php
// phpinfo();
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/config/bd.php';
require __DIR__ . '/../src/config/database.php';


// $bd = new BD();
// $bd = $bd->conexion();

// Create App
$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->setBasePath('/proyectoslim');


// Create Twig
$twig = Twig::create('../src/templates', ['cache' => false]);

// Add Twig-View Middleware
$app->add(TwigMiddleware::create($app, $twig));

require __DIR__ . '/../src/rutas/usuario.php';
// require __DIR__ . '/../src/rutas/notepad.php';

// Define named route
$app->get('/', function ($request, $response, $args) {
    $view = Twig::fromRequest($request);
    return $view->render($response, 'inicio.php');
})->setName('inicio');




$app->run();
