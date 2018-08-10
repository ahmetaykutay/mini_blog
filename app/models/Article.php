<?php

/**
 * uses $get_pdo function
 */
namespace App\Model;

class Article
{
  public $title;
  public $body;
  public $author;
  public $date;

  /**
   * @param Assoc $user
   */
  function __construct($title, $body, $author_id)
  {

    $this->title = $title;
    $this->body = $body;
    $this->author = (int)$author_id;
    $this->date = date('Y-m-d H:i:s', time());
  }

  /**
   * @return Bool
   */
  public function save()
  {
    // sql template
    $sql = "INSERT INTO articles (title, body, author, created_at) VALUES(?, ?, ?, ?)";
    // init prepared statement
    $query = get_pdo()->prepare($sql);

    if (!$query->execute([$this->title, $this->body, $this->author, $this->date])) {
      throw new Exception("Article could not saved");
    } else {
      return true;
    }
  }

  /**
   * @param Int [$limit]
   */
  public static function get_articles($limit = 0)
  {
    // sql template
    $sql = "SELECT 
    articles.id, 
    articles.title, 
    articles.body, 
    articles.created_at,
    users.id as user_id,
    users.user_name as author_name
    FROM articles JOIN users On articles.author=users.id
    ORDER BY created_at DESC;";

    if ($limit > 0) {
      $sql += "LIMIT $limit";
    }
    // init prepared statement
    $query = get_pdo()->prepare($sql);

    if (!$query->execute()) {
      throw new Exception("Getting Articles failed");
    } else {
      return $query->fetchAll();
    }
  }

  public static function get_by_id($id)
  {
    $id = (int)$id;
    $sql = "SELECT 
    articles.id, 
    articles.title, 
    articles.body, 
    articles.created_at,
    users.id as author_id,
    users.user_name as author_name
    FROM articles JOIN users On articles.author=users.id
    WHERE articles.id=$id;";

    // init prepared statement
    $query = get_pdo()->prepare($sql);

    if (!$query->execute()) {
      throw new Exception("Getting Article failed");
    } else {
      return $query->fetchAll();
    }
  }

  public function delete($id)
  {
    $id = (int)$id;
    $sql = "DELETE FROM articles WHERE id=$id";

    // init prepared statement
    $query = get_pdo()->prepare($sql);

    if (!$query->execute()) {
      throw new Exception("Deleting the Article failed");
    } else {
      return true;
    }
  }

}