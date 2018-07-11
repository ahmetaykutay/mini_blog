<?php

namespace Core;

class Router
{
  /**
   * splits uri into an array,
   * first index is controller class name
   * second index is method to call (if there isn't call index method) 
   * send rest of the array as arguments to the method uri[1](uri[2], uri[3], ...)
   */
  public static function route($uri)
  {
    // get controller name
    $controller_name = (isset($uri[0]) && $uri[0] !== '') ? ucwords($uri[0]) : DEFAULT_CONTROLLER;
    array_shift($uri);

    // get method of the controller to call
    $action = (isset($uri[0]) && $uri[0] !== '') ? $uri[0] : 'index';
    array_shift($uri);

    // get controller
    $controller = 'App\Controller\\' . $controller_name;
    // dnd($controller);
    
    // instantiate Controller if exists, otherwise give 404 error
    if (method_exists($controller, $action)) {
      $dispatch = new $controller();
      call_user_func_array([$dispatch, $action], $uri);
    } else {
      echo '404 Page not found';
    }
  }
}