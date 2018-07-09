<?php include 'views/includes/header.php' ?>


<h1>dashboard</h1>

<form action="users/register">
  <input type="submit" name="submit">
</form>

<?php 
if ($_SESSION['message_test']) {
  echo $_SESSION['message_test'];
}
?>


<?php include 'views/includes/footer.php' ?>