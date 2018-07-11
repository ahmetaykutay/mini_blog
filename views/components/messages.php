<?php if (isset($_SESSION['message'])) : ?>
  <div class="alert text-center alert-<?php echo $_SESSION['message']['type'] === 'success' ? 'success' : 'danger' ?>" role="alert">
    <?php echo $_SESSION['message']['text']; ?>
  </div>
<?php
  // clear the message after showing
unset($_SESSION['message']);
endif;
?>