<?php 

namespace App\Controller;

use Core\Controller;

class Home extends Controller
{

  public function index()
  {
    $this->load_view('home/index');
  }
}