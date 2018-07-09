<?php 

namespace App\Controller;

use App\Model\User;

class Users
{

  public function index()
  {
    echo 'users page';
  }

  public function login()
  {
    if ($_POST['userName'] == '' or $_POST['password'] == '') {
      $_SESSION['message_error'] = 'please fill all fields';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    $user_name = $_POST['userName'];
    $password = $_POST['password'];

    $user = User::get_by_user_name($user_name);

    if (password_verify($password, $user['password'])) {
      $_SESSION['user'] = array(
        'id' => $user['id'],
        'user_name' => $user['user_name'],
        'email' => $user['email']
      );
      $_SESSION['message'] = array(
        'text' => 'login sucessfull',
        'type' => 'success'
      );
    } else {
      $_SESSION['message'] = array(
        'text' => 'login failed',
        'type' => 'error'
      );
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }

  public function logout()
  {
    if ($_POST['logout']) {
      unset($_SESSION['user']);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}