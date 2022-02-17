<?php
require_once "Autoloader.php";

use Core\Constants;

$controllerName = strtolower($_GET['controller'] ?? 'index');
$actionName = strtolower($_GET['action'] ?? 'index');

$controllerClassName = "Controller\\" . ucfirst($controllerName) . "Controller";
$actionName = ucfirst($actionName . 'Action');

$statusCode = null;
if (file_exists(Autoloader::GetClassFileName($controllerClassName))) {
    $controller = new $controllerClassName;
} else {
    $statusCode = Constants\HTTPResponseCodes::HTTP_NOT_FOUND;
}

if ($statusCode !== Constants\HTTPResponseCodes::HTTP_NOT_FOUND) {
    if (method_exists($controller, $actionName)) {
        if($controllerClassName == "Controller\IndexController"
            || $controllerClassName == "Controller\UserController") {
            \Core\TemplateHandler::displayGlobalHeader();
            $controller->$actionName();
            \Core\TemplateHandler::displayGlobalFooter();
            exit;
        } else {
            Core\TemplateHandler::displayDashBoardHeader();
            $controller->$actionName();
            \Core\TemplateHandler::displayDashboardFooter();
        }
    } else {
        $statusCode = Constants\HTTPResponseCodes::HTTP_NOT_FOUND;
    }
}

if ($statusCode !== null && $statusCode !== Constants\HTTPResponseCodes::HTTP_OK) {
    $controller = new \Controller\IndexController();
    $controller->ErrorAction($statusCode);
}