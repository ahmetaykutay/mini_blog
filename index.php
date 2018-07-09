<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));

/**
 * get url as an array
 * @global
 */
$url = isset($_SERVER['PATH_INFO']) ? explode('/', trim($_SERVER['PATH_INFO'], '/')) : [];

// bootstrap app
require_once ROOT . DS . 'core' . DS . 'bootstrap.php';