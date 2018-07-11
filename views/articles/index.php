<?php 
include 'views/includes/header.php';
include 'views/components/nav.php';
include 'views/components/messages.php';
?>

<div class="container p-5">
<?php 
if (isset($data['articles'])) :
  foreach ($data['articles'] as $article) : ?>
  <div class="row mx-0 my-4 d-flex align-items-stretch flex-column">
    <div>
      <h3 class="text-capitalize">
        <a href="<?php echo BASE_URL . 'articles/article/' . $article['id']; ?>">
          <?php echo $article['title'] ?>
        </a>
      </h3>
      <small class="text-muted">by <?php echo $article['author_name'] ?> at: <?php echo $article['created_at'] ?></small>
    </div>
    <p class="mt-4"><?php echo shorten_text($article['body'], '...', 5) ?></p>
  </div>
  <hr>
<?php 
endforeach;
endif; ?>
</div>


<?php include 'views/includes/footer.php' ?>