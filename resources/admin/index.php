<?php
use App\Core\Database;
use App\Core\View;

$database = new Database();

require __DIR__ . '/partials/head.php';
View::render('/index.view.php', [
    'heading' => 'ADMIN PAGE',
]);
require __DIR__ . '/partials/foot.php';