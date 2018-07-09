<?php include 'views/includes/header.php' ?>


<h1>this is the home page</h1>

<div>
  <form action="<?php echo BASE_URL ?>users/logout" method="POST">
    <input value="logout" type="submit" name="logout">
  </form>
</div>



<?php 
if ($_SESSION['message']) {
  echo $_SESSION['message']['text'];
  unset($_SESSION['message']);
}
?>


<?php include 'views/includes/footer.php' ?>