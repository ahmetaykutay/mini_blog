<?php 

namespace App\Controller;

class Dashboard
{
  public function index()
  {
    include ROOT . DS . 'views'. DS .'dashboard.php';
  }
}