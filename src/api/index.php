<?php
require_once('settings.php');
if(!defined('CERT_STORE'))
    die('ERROR: Invalid settings');
if(!is_dir(CERT_STORE))
    die('ERROR: Certificate store not found');

require_once('functions.php');
require_once('routing/RouteHandler.php');

$queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($queryString, $queryParameters);

$routeHandler = RouteHandler::CreateHandler();
$routeHandler->Process($queryParameters);