<?php

use PhpCsUi\Application;
use Symfony\Component\HttpFoundation\Request;

/** show all errors! */
ini_set('display_errors', 1);
error_reporting(E_ALL);

$app = new Application();


// Website
$app->get('/', 'PhpCsUi\Controller\DashboardController::indexAction');
$app->get('/test', 'PhpCsUi\Controller\DashboardController::testAction');

return $app;
