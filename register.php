<?php include_once("includes/header.php"); ?> 

<section class="register">
    <h2>Registrera</h2>
    <div class="register-form">
        <form action="includes/register.inc.php" method="post">
            <input type="text" name="alias" placeholder="Användarnamn" />
            <input type="text" name="email" placeholder="E-post" />
            <input type="password" name="pwd" placeholder="Lösenord" />
            <input type="password" name="pwdrepeat" placeholder="Bekräfta lösenord" />
            <button type="submit" name="submit" class="button submit-button">Skicka formulär</button>
        </form>
    </div>
</section>


<?php include_once("includes/footer.php"); ?> 
