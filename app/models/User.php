<?php

/**
 * uses $get_pdo function
 */
namespace App\Model;

class User
{
  public $user_name;
  public $email;
  private $password;

  /**
   * @param Assoc $user
   */
  function __construct($user)
  {
    // make sure email and password is passed
    if (!$user['email'] or !$user['password']) {
      return null;
    }

    $this->email = $user['email'];
    $this->user_name = $user['user_name'] ? $user['user_name'] : $this->email;
    $this->password = $user['password'];
  }

  /**
   * return user data
   * @return Assoc user data
   */
  static public function get_by_user_name($user_name)
  {
    // query template
    $sql = "SELECT * FROM users WHERE user_name=?;";
    // init prepared statement
    $stmt = get_pdo()->prepare($sql);

    if (!$stmt->execute([$user_name])) {
      throw new Exception("Could not fetch user");
    } else {
      // get result
      $result = $stmt->fetch();
      return $result;
    }
  }

  /**
   * create new user
   * @return Bool successful
   */
  public function save()
  {
    // sql template
    $sql = "INSERT INTO users (user_name, email, password) VALUES(?, ?, ?)";
    // init prepared statement
    $stmt = get_pdo()->prepare($sql);

    if (!$stmt->execute([$this->user_name, $this->email, $this->password])) {
      throw new Exception("Could not fetch user");
    } else {
      return true;
    }
  }
}