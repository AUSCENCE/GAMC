<?php
  session_start();
// load composer dependencies
require '../vendor/autoload.php';
define('BASE_VIEW_PATH',dirname(__DIR__).DIRECTORY_SEPARATOR. 'App/Views' .DIRECTORY_SEPARATOR);
define('BASE_PATH',(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http"). "://$_SERVER[HTTP_HOST]");

// Start the routing
\Gamc\Routes\Router::start();