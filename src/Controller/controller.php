<?php

namespace Controller;

use Controller\HomeController;
use Controller\AuthController;
use Controller\ContentController;

// $action = $_GET["action"] ?? "display";
$action = substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1);

switch ($action) {
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;
    case 'new':
        $controller = new ContentController();
        $controller->create();
        break;
    case 'display':
    default:
        $controller = new HomeController();
        $controller->display();
        break;
}
