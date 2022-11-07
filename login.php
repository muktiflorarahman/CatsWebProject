<?php include_once('includes/header.inc.php') ?>

<section class="login-form">
  <h2>Log in</h2>
  <div class="login-form-form">
    <form action="includes/login.inc.php" method="post">
      <input type="text" name="alias" placeholder="Username/Email..." />
      <input type="password" name="pwd" placeholder="Password..." />
      <button type="submit" name="submit" class="button submit-button">Log in</button>
    </form>
  </div>
</section>

<?php include_once('includes/footer.inc.php') ?>