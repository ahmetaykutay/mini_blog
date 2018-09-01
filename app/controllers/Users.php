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
    // check if password or user name is empty
    if ($_POST['userName'] == '' or $_POST['password'] == '') {
      $this->send_back_msg('please fill all fields', 'error');
    }

    // get username and password
    $user_name = $_POST['userName'];
    $password = $_POST['password'];

    // fetch user from DB
    $user = User::get_by_user_name($user_name);

    // verify password
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