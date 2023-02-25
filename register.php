<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <title>Registrera</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php
    session_start();
    include('config/db_connect.php');


    /* Efter att formuläret är skickat förs alla värden in till databasen */
    if (isset($_POST["submit"])) {
        if ($_POST["alias"] == "" || $_POST["email"] == "" || $_POST["password"] == "") {
            echo ("<div class='credentials'>
                <h3>Alla fält måste vara ifyllda.</h3><br/>
                <a href='register.php'>
                <button class='btn-again'>Registrera igen</button>
                </a>
                </div>");
        } else {
            try {
                $alias = htmlspecialchars($_POST["alias"]);
                $email = htmlspecialchars($_POST["email"]);
                $password = htmlspecialchars($_POST["password"]);

                $query = "INSERT INTO users (users_alias, users_email, users_pwd) VALUES (?, ?, ?);";
                $hash_pwd = password_hash($password, PASSWORD_DEFAULT);


                $stmt = $pdo->prepare($query);
                $result = $stmt->execute(array($alias, $email, $hash_pwd));
                if ($result) {
                    echo "<div class='credentials'>
                  <h3>Registreringen lyckades.</h3><br />
                  <a href='login.php'>
                    <button class='btn-again'>Logga in</button>
                  </a>
                </div>";
                } else {
                    echo "<div class='credentials'>
                  <h3>Något gick fel.</h3><br />
                  <a href='register.php'>
                    <button class='btn-again'>Registrera igen</button>
                  </a>
                </div>";
                }
            } catch (PDOException $e) {
                echo ($e->getMessage());
            }
        }
        $pdo = null;
    } else { ?>


        <section class="container login">
            <form id="login-form" class="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <h4 class="">Registrera ny användare</h4>

                <div class="form-group">
                    <label for="alias">Alias</label>
                    <input <?php if (isset($errors['alias'])) {
                                echo 'class="input-error"';
                            } ?> placeholder="Ange ditt alias..." type="text" name="alias" id="alias" value="<?php echo !empty($_POST['alias']) ? htmlspecialchars($_POST['alias']) : '' ?>">
                    <div class="error">
                        <?php echo $errors['name'] ?? '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input <?php if (isset($errors['email'])) {
                                echo 'class="input-error"';
                            } ?> placeholder="Ange din email..." type="email" name="email" id="email" value="<?php echo !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>">
                    <div class="error">
                        <?php echo $errors['name'] ?? '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input <?php if (isset($errors['password'])) {
                                echo 'class="input-error"';
                            } ?> placeholder="Ange ditt lösenord..." type="password" name="password" id="password" value="<?php echo !empty($_POST['password']) ? htmlspecialchars($_POST['password']) : '' ?>">
                    <div class="error">
                        <?php echo $errors['name'] ?? '' ?>
                    </div>
                </div>


                <div class="btn-group register-person">
                    <input type="submit" name="submit" value="Registrera" class="btn">
                    <a href="login.php" class="button link">
                        Logga in
                    </a>
                </div>

            </form>

        </section>

    <?php } ?>

    <footer>
        <div class="copyright">&copy; Copyright 2022 Kattadoption</div>
    </footer>

    <script src="credentials.js"></script>

</body>

</html>