<?php
require_once('routing/RouteHandler.php');

$routeHandler = RouteHandler::CreateHandler();
$routeHandler->Process();