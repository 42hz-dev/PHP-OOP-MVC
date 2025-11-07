<?php

use App\Http\Controllers\UserController;
use App\Http\Repositories\UserRepository;
use App\Http\Services\UserService;
use Core\Database;
use Core\View;

$database = new Database([
    'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'test',
    'charset' => 'utf8'
]);

$userRepository = new UserRepository($database->getConnection());
$userService = new UserService($userRepository);
$userController = new UserController($userService);
$user = $userController->index();

require __DIR__ . '/partials/head.php';
View::render('/index.view.php', [
    'heading' => 'Index',
    'user' => [
        'id' => $user->getId(),
        'name' => $user->getName(),
        'age' => $user->getAge()
    ],
]);
require __DIR__ . '/partials/foot.php';