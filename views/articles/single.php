<?php 
include 'views/includes/header.php';
include 'views/components/nav.php';
include 'views/components/messages.php';
?>

<div class="container p-5">
<div class="row article d-flex flex-column">
  <h1 class="text-capitalize text-center"><?php echo $data['article']['title'] ?></h1>
  <div class="body">
    <p class="my-4"><?php echo $data['article']['body'] ?></p>
    <hr>
  </div>
  <footer class="d-flex justify-content-between">
    <p class="text-muted">By <?php echo $data['article']['author_name'] ?>
     <small class="ml-3"><?php echo $data['article']['created_at'] ?></small>
    </p>
    <?php if ($_SESSION['user']['id'] == $data['article']['author_id']) : ?>
      <form method="POST" action="<?php echo BASE_URL ?>articles/delete/<?php echo $data['article']['id'] ?>">
        <input class="btn btn-sm btn-danger" value="delete" type="submit">
      </form>
    <?php endif; ?>
    </footer>
</div>
</div>


<?php include 'views/includes/footer.php' ?>