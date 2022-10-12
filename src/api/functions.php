<?php

function PathJoin(/* variable args */)
{
    return join(DIRECTORY_SEPARATOR, func_get_args());
}

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
