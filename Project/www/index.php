<?php

spl_autoload_register(function(string $className){
    $file = dirname(__DIR__) . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$route = $_GET['route'] ?? '';
$patterns = require('route.php');
$findRoute = false;

foreach ($patterns as $pattern => $controllerAndAction) {
    if (preg_match($pattern, $route, $matches)) {
        $findRoute = true;
        unset($matches[0]);
        $action = $controllerAndAction[1];
        $controller = new $controllerAndAction[0];
        $controller->$action(...$matches);
    }
}

if (!$findRoute) echo 'Страница не найдена';
