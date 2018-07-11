<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo BASE_URL ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL ?>articles">Articles</a>
      </li>
    <?php 
    // ul ends in if/else statement so new links can be added respected to authentication state
    if(isset($_SESSION['user'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo BASE_URL ?>articles/add">Add Article</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php echo BASE_URL ?>users/logout" method="POST">
      <input class="btn btn-sm btn-secondary ml-3 px-3" value="Logout" type="submit" name="logout">
    </form>
    <?php else: ?>
    </ul> 
    <form class="form-inline my-2 my-lg-0" action="<?php echo BASE_URL ?>users/login" method="POST">
      <div class="form-group">
        <input class="form-control form-control-sm" type="text" placeholder="User name" name="userName">
      </div>
      <div class="form-group ml-3">
        <input class="form-control form-control-sm" type="password" name="password" placeholder="Password">
      </div>
      <input class="btn btn-sm btn-primary ml-3 px-3" value="Login" type="submit" name="login">
    </form>
    <?php endif; ?>
  </div>
</nav>