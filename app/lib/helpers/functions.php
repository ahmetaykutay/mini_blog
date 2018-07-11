<?php

require_once ROOT . DS . 'app' . DS . 'lib' . DS . 'helpers' . DS . 'helpers.php';


function get_pdo()
{
  try {
    $dsn = "mysql:host=" . $_ENV['DB_SERVER_NAME'] . ";dbname=" . $_ENV['DB_NAME'] . ";charset=" . $_ENV['DB_CHARSET'];
    $pdo = new PDO($dsn, $_ENV['DB_USER_NAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

/**
 * shorten given string if it exides the limit
 * @param String repl
 */
function shorten_text($string, $repl, $limit) 
{
  if(strlen($string) > $limit) 
  {
    return substr($string, 0, $limit) . $repl; 
  }
  else 
  {
    return $string;
  }
}