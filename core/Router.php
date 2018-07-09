<?php

namespace Core;

class Router
{
  public static function route($url)
  {
    // get controller name
    $controller_name = (isset($url[0]) && $url[0] !== '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
    array_shift($url);

    // get method of the controller to call
    $action = (isset($url[0]) && $url[0] !== '') ? $url[0] : 'index';
    array_shift($url);
    
    // get params to pass to the method
    $queryParams = $url;

    // get controller
    $controller = 'App\Controller\\' . $controller_name;
    // dnd($controller);
    
    // instantiate Controller if exists, otherwise give 404 error
    if (method_exists($controller, $action)) {
      $dispatch = new $controller();
      call_user_func_array([$dispatch, $action], $queryParams);
    } else {
      echo '404 Page not found';
    }
  }
}