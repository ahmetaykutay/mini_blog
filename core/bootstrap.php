<?php

// composer autoloader
require 'vendor/autoload.php';

// Load helper functions
require_once ROOT . DS . 'config' . DS . 'config.php';
require_once ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'functions.php';

// show errors if on debug mode
if (DEBUG) {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

// Route the request
Core\Router::route($url);