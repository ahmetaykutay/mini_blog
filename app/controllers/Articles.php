<?php 

namespace App\Controller;

use App\Model;
use App\Model\Article;
use Core\Controller;

class Articles extends Controller
{

  public function index()
  {
    $articles = Article::get_articles();
    $this->load_view('articles/index', array(
      'articles' => $articles
    ));
  }

  /**
   *  / -> send add post view
   *  /save -> save the article
   */
  public function add($save = false)
  {
    // restrict access to users only
    if (!isset($_SESSION['user'])) {
      header('Location: ' . BASE_URL);
      exit();
    }

    if ($save) {
      // check if form is empty
      if (!isset($_POST['title']) || !isset($_POST['body'])) {
        $this->send_back_msg('Please fill all fields', 'error');
      }
      // save the article
      else {
        $article = new Article($_POST['title'], $_POST['body'], $_SESSION['user']['id']);
        // dnd($article);
        if (!$article->save()) {
          $this->send_back_msg("saving article failed", 'error');
        } else {
          $this->send_back_msg('Article saved');
        }
      }
    } else {
      $this->load_view('articles/add');
    }
  }

  public function article($id)
  {
    $article = Article::get_by_id($id);
    $this->load_view('articles/single', array(
      'article' => $article[0]
    ));
  }

  public function delete($id = null)
  {
    if (!isset($_SESSION['user']) || $id === null || !isset($_POST['deleteArticle'])) {
      header('Location: ' . BASE_URL . 'articles');
    }

    $article = Article::get_by_id($id)[0];
    if ($article['author_id'] != $_SESSION['user']['id']) {
      $this->send_back_msg('Unauthorized', 'error');
    } else {
      $result = Article::delete($article['id']);
      if ($result) {
        $this->send_back_msg('Article successfully deleted');
      }
    }
  }
}