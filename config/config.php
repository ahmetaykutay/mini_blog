<?php

define('DEBUG', true);

define('DEFAULT_CONTROLLER', 'Home');
define('BASE_URL', 'http://localhost/mini_blog/');

// get env variables from ROOT/.env
$dotenv = new Dotenv\Dotenv(ROOT);
$dotenv->load();