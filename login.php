<?php

include('config/db_connect.php');
?>

<?php include('templates/header.php'); ?>

<section class="container login">
    <form id="login-form" class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h4 class="">Logga in</h4>

        <div class="form-group">
            <label for="alias">Alias</label>
            <input <?php if (isset($errors['alias'])) {
                        echo 'class="input-error"';
                    } ?> placeholder="Ange ditt alias..." type="text" name="alias" id="alias" value="<?php echo !empty($_POST['alias']) ? htmlspecialchars($_POST['alias']) : '' ?>" />
            <div class="error">
                <?php echo $errors['name'] ?? '' ?>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Lösenord</label>
            <input <?php if (isset($errors['password'])) {
                        echo 'class="input-error"';
                    } ?> placeholder="Ange ditt lösenord..." type="password" name="password" id="password" value="<?php echo !empty($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>" />
            <div class="error">
                <?php echo $errors['name'] ?? '' ?>
            </div>
        </div>


        <div class="button add-person">
            <input type="submit" name="submit" value="Skicka" class="btn">
        </div>

    </form>

</section>

<?php include('templates/footer.php'); ?>