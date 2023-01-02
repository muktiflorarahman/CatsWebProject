<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Logga in</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php
    session_start();
    include('config/db_connect.php');


    /* Efter att formuläret är skickat förs alla värden in till databasen */
    if (isset($_POST["submit"])) {
        if ($_POST["alias"] == "" || $_POST["password"] == "") {
            echo ("<div class='credentials'>
                <h3>Alla fält måste vara ifyllda.</h3><br/>
                <a href='login.php'>
                <button class='btn-again'>Logga in</button>
                </a>
                </div>");
        } else {
            $alias = $_POST["alias"];
            $password = $_POST["password"];
            /*             $hashed_pwd = password_hash($password, PASSWORD_DEFAULT);
 */
            $query = "SELECT * FROM users WHERE users_alias = ?;";
            $stmt = $pdo->prepare($query);
            $result = $stmt->execute(array($alias));
            $user = $stmt->fetch();
            if ($user && password_verify($password, $user["users_pwd"])) {
                $_SESSION["userid"] = $user["users_id"];
                $_SESSION["username"] = $user["users_alias"];
                $_SESSION["useremail"] = $user["users_email"];
                header("location: index.php");
            } else {
                echo ("<div class='credentials'>
                    <h3>Fel alias eller lösenord.</h3><br/>
                    <a href='login.php'>
                    <button class='btn-again'>Logga in</button>
                    </a>
                    </div>");
            }
            $pdo = null;
        }
    } else { ?>


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


                <div class="btn-group login-person">
                    <input type="submit" name="submit" value="Logga in" class="btn" />
                    <a href="register.php">
                        <button type="button" class="link">Registrera></button>
                    </a>
                </div>

            </form>

        </section>

    <?php
    }
    ?>

    <footer>
        <div class="copyright">&copy; Copyright 2022 Kattadoption</div>
    </footer>

    <script src="credentials.js"></script>
</body>

</html>