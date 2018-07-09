<?php include 'views/includes/header.php' ?>

<h1>Log in</h1>

<form action="<?php echo BASE_URL ?>users/login" method="POST">
  <input required name="userName" type="text" placeholder="user name">
  <input required name="password" type="password" placeholder="password">
  <input name="submit" type="submit">
</form>


<?php 
if ($_SESSION['message']) {
  echo $_SESSION['message']['text'];
  unset($_SESSION['message']);
}
?>


<?php include 'views/includes/footer.php' ?>