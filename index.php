<?php
use Core\Router;

spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require_once __DIR__ . "/" .$class . ".php";
});

$router = new Router();
$routes = require __DIR__ . "/routes.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (Exception $e) {
    echo $e->getMessage();
}
