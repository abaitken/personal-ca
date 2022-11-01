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
    if (count($routeParts) == 0)
        return 'viewparts/index.html';

    if (count($routeParts) == 1) {
        switch (strtolower($routeParts[0])) {
            case 'index':
                return 'viewparts/index.html';
            default:
                return 'viewparts/unknownroute.html';
        }
    }

    if (count($routeParts) == 2) {
        switch (strtolower($routeParts[0])) {
            case 'csr': {
                    switch (strtolower($routeParts[1])) {
                        case 'create':
                            return 'viewparts/csr/create.html';
                        case 'import':
                            return 'viewparts/csr/import.html';
                        case 'upload':
                            return 'viewparts/csr/upload.html';
                        default:
                            return 'viewparts/unknownroute.html';
                    }
                }
            case 'cert': {
                    switch (strtolower($routeParts[1])) {
                        case 'import':
                            return 'viewparts/cert/import.html';
                        case 'upload':
                            return 'viewparts/cert/upload.html';
                        default:
                            return 'viewparts/unknownroute.html';
                    }
                }
            default:
                return 'viewparts/unknownroute.html';
        }
    }

    return 'viewparts/unknownroute.html';
}

$urlParts = parse_url($_SERVER['REQUEST_URI']);
$queryString = isset($urlParts['query']) ? parse_url($urlParts['query']) : '';
parse_str($queryString, $queryParameters);
$routeParts = GetRouteParts();

$loader = new \Twig\Loader\FilesystemLoader('./');
$twig = new \Twig\Environment($loader);

$scriptName = $_SERVER['SCRIPT_NAME'];
$appPath = substr($scriptName, 0, strrpos($scriptName, '/'));

echo $twig->render(RouteToTemplate($routeParts), [
    'APPROOT' => $appPath
]);
