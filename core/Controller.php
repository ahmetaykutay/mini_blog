<?php

namespace Core;

class Controller
{
  protected static function send_back_msg($msg, $type = 'success')
  {
    $_SESSION['message'] = array(
      'text' => $msg,
      'type' => $type
    );
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
  }

  /**
   * load view from views folder
   * @param String name - name of the view
   * @param Assoc [data] = array() - variables to pass view
   */
  protected static function load_view($name, $data = [])
  {
    include ROOT . DS . 'views' . DS . $name . '.php';
  }
}