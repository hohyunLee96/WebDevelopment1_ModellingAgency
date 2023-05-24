<?php
require __DIR__ . '/../routers/switchrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

session_start();

$router = new SwitchRouter();
$router->route($uri);
