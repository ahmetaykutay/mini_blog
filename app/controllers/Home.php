<?php 

namespace App\Controller;

class Home
{

  public function index()
  {
    if (isset( $_SESSION['user'] )) {
      load_view('home');
    } else {
      load_view('auth');
    }
  }
}