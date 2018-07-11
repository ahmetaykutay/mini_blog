<?php 
include 'views/includes/header.php';
include 'views/components/nav.php';
include 'views/components/messages.php';
?>

<div class="container">
  <div class="row mt-5 p-5">
    <form method="POST" action="<?php echo BASE_URL ?>articles/add/save" class="add-article">
      <div class="form-group">
        <label for="article_title">Title</label>
        <input name="title" type="text" class="form-control" id="article_title" placeholder="Title">
      </div>
      <div class="form-group">
        <label for="article_body">Body</label>
        <textarea name="body" type="text" class="form-control" id="article_body" ></textarea>
      </div>
      <div class="form-group mt-3 d-flex justify-content-center">
        <input type="submit" value="Save" class="form-control btn btn-primary">
      </div>
    </form>
  </div>
</div>

<?php include 'views/includes/footer.php' ?>