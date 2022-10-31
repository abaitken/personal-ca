<?php
require_once 'vendor/autoload.php';

function GetRouteParts(): array
{
    $self = $_SERVER['PHP_SELF'];
    $lastSlash = strrpos($self, '/');
    $urlPart = substr($self, 0, $lastSlash);

    $parts = parse_url($_SERVER['REQUEST_URI']);
    $path = $parts['path'];
    $apiRoute = substr($path, strlen($urlPart));
    $routeParts = explode('/', $apiRoute);

    $result = array();
    foreach ($routeParts as &$value) {
        if (strlen($value) != 0)
            array_push($result, $value);
    }
    unset($value);
    return $result;
}

function RouteToTemplate($routeParts)
{
    if(count($routeParts) == 0)
    {
        return 'index';
    }
    
    // TODO : Switch case here
    return strtolower($routeParts[0]);
}

$urlParts = parse_url($_SERVER['REQUEST_URI']);
$queryString = isset($urlParts['query']) ? parse_url($urlParts['query']) : '';
parse_str($queryString, $queryParameters);
$routeParts = GetRouteParts();

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader);

$filename = RouteToTemplate($routeParts);

$scriptName = $_SERVER['SCRIPT_NAME'];
$appPath = substr($scriptName, 0, strrpos($scriptName, '/'));

echo $twig->render('viewparts/' . $filename . '.html', [
    'activePage' => $filename,
    'APPROOT' => $appPath
]);

