<?php include_once('includes/header.inc.php') ?>

<section class="register">
  <h2>Register</h2>
  <div class="register-form">
    <form action="includes/register.inc.php" method="post">
      <input type="text" name="alias" placeholder="Username..." />
      <input type="text" name="email" placeholder="Email..." />
      <input type="password" name="pwd" placeholder="Password..." />
      <input type="password" name="pwdrepeat" placeholder="Repeat Password..." />
      <button type="submit" name="submit" class="button submit-button">Register</button>
    </form>
  </div>
</section>

<?php include_once('includes/footer.inc.php') ?>