<?php 

namespace App\Controller;

use App\Model\User;
use Core\Controller;

class Users extends Controller
{

  public function index()
  {
    echo 'users page';
  }

  public function login()
  {
    if ($_POST['userName'] == '' or $_POST['password'] == '') {
      $this->send_back_msg('please fill all fields', 'error');
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

      $this->send_back_msg('login sucessfull');
    } else {
      $this->send_back_msg('login failed', 'error');
    }
  }

  public function logout()
  {
    if ($_POST['logout']) {
      unset($_SESSION['user']);
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}