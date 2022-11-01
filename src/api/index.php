<?php
require_once('settings.php');

$scriptName = $_SERVER['SCRIPT_NAME'];
$appPath = substr($scriptName, 0, strrpos($scriptName, '/'));
$requestRoute = substr($_SERVER['REQUEST_URI'], strlen($appPath));

if (!defined('CERT_STORE')) {
    http_response_code(500);
    header("Content-Type: application/json");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    echo json_encode(array(
        "type" => $appPath . "/docs/invalid-settings",
        "title" => "Invalid settings",
        "detail" => "Settings are invalid or missing",
        "status" => 500,
        "instance" => $requestRoute
    ));
    exit();
}
if (!is_dir(CERT_STORE)) {
    http_response_code(500);
    header("Content-Type: application/json");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    echo json_encode(array(
        "type" => $appPath . "/docs/invalid-settings",
        "title" => "Invalid settings",
        "detail" => "Certificate store not found",
        "status" => 500,
        "instance" => $requestRoute
    ));
    exit();
}

require_once('functions.php');
require_once('routing/RouteHandler.php');

$queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($queryString, $queryParameters);

$routeParts = GetRouteParts();
$routeHandler = RouteHandler::CreateHandler($routeParts);
$routeHandler->Process($queryParameters, $routeParts);
