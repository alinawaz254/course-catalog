<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../utils/Database.php';
require_once __DIR__ . '/../controllers/CoursesController.php';
require_once __DIR__ . '/../controllers/CategoriesController.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

switch ($requestUri) {
    case '/':
        header('Location: /index.html');
        break;
    case '/course-catalog/api/public/courses':
        $controller = new CoursesController();
        $controller->index();
        break;
        case preg_match('|^/course-catalog/api/public/courses/([a-zA-Z0-9]+)$|', $requestUri, $matches) ? true : false:
        $controller = new CoursesController();
        $controller->show($matches[1]);
        break;
        case preg_match('|^/course-catalog/api/public/categories/([a-f0-9\-]+)/courses$|i', $requestUri, $matches) ? true : false:
        $controller = new CategoriesController();
        $controller->courses($matches[1]);
        break;
    case '/course-catalog/api/public/categories':
        $controller = new CategoriesController();
        $controller->index();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}