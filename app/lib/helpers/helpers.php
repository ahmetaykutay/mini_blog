<?php

/**
 * @description dump and die
 */
function dnd($data)
{
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  die();
}


function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}
