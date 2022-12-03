<?php
require("catsList.php")

?>

<?php include("templates/header.php"); ?>


<section class="container add">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="add-form" method="POST">
        <h4>
            Lägg till ny katt
        </h4>

        <label for="name">Kattens namn</label>
        <input type="text" name="name" id="name" value="<?php $temp = $_POST['name'] ?? ''; ?> <?php echo htmlspecialchars($temp); ?>" />
        <div class="error">
            <?php echo $errors['name'] ?? ''; ?>
        </div>

        <label for="breed">Kattens ras</label>
        <select name="breed" id="breed" value="<?php $temp = $_POST['breed'] ?? ''; ?> <?php echo htmlspecialchars($temp); ?>">

            <option value="" disabled selected>Välj ras</option>
            <?php
            /* Skapar option taggar med foreach sats */
            foreach ($cats_list as $breed) {
                /* Gör en string concatenation för att få ut alla raser */
                echo "<option value='" . $breed . "'>" . $breed . "</option>";
            }
            ?>
        </select>
        <div class="error">
            <?php echo $errors['breed'] ?? ''; ?>
        </div>

        <label for="info">Information om katten</label>
        <textarea name="info" id="info" rows="4" cols="50" placeholder="information om katten som ska adopteras..." value="<?php $temp = $_POST['info'] ?? ''; ?> <?php echo htmlspecialchars($temp); ?>"></textarea>
        <div class="error">
            <?php echo $errors['info'] ?? ''; ?>
        </div>

        <label for="picture">Bild på katten</label>
        <input type="text" name="picture" id="picture" placeholder="Filens namn..." value="<?php $temp = $_POST['picture'] ?? ''; ?> <?php echo htmlspecialchars($temp); ?>" />
        <div class="error">
            <?php echo $errors['picture'] ?? ''; ?>
        </div>

        <div class="button">
            <input type="submit" value="Skicka" class="btn" name="submit">
        </div>

    </form>
</section>