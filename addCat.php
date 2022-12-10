<?php
include("config/db_connect.php");
require("catsList.php");
require("catValidator.php");

$errors = [];
if (isset($_POST["submit"])) {
    /* validerar kattfälten */
    $catValidation = new catValidator($_POST);
    $errors = $catValidation->validateForm();

    $nameError = $errors['name'] ?? '';
    $breedError = $errors['breed'] ?? '';
    $infoError = $errors['info'] ?? '';
    $pictureError = $errors['picture'] ?? '';

    if (array_filter($errors)) {
        //echo 'errors in form';
        echo "Name" . $nameError;
        echo "Breed" . $breedError;
        echo "Info" . $infoError;
        echo "Picture" . $pictureError;
    } else {
        // escape sql chars
        $name = htmlspecialchars($_POST["name"]);
        $breed = htmlspecialchars($_POST["breed"]);
        $info = htmlspecialchars($_POST["info"]);
        $picture = htmlspecialchars($_POST["picture"]);
    }
}

?>

<?php include("templates/header.php"); ?>


<section class="container add">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" class="add-form" method="POST">
        <h4>
            Lägg till ny katt
        </h4>

        <div class="form-group">
            <label for="name">Kattens namn</label>
            <input <?php if (isset($errors['name'])) {
                        echo 'class="input-error"';
                    } ?> placeholder="Fyll i kattens namn..." type="text" name="name" id="name" value="<?php echo !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>" />
            <div class="error">
                <?php echo $errors['name'] ?? '' ?>
            </div>
        </div>

        <!-- -------- -->

        <div class="form-group">
            <label for="breed">Kattens ras</label>
            <select <?php if (isset($errors['breed'])) {
                        echo 'class="input-error"';
                    } ?> form="cat-form" name="breed" id="breed" value="<?php echo !empty($_POST['breed']) ? htmlspecialchars($_POST['breed']) : '' ?>">
                <option value="" disabled selected>Välj ras</option>
                <?php
                foreach ($cats_list as $cat) {
                    echo "<option value='" . $cat . "'>" . $cat . "</option>";
                }
                ?>
            </select>
            <div class="error">
                <?php echo $errors['breed'] ?? '' ?>
            </div>
        </div>

        <!-- ----- -->

        <div class="form-group">
            <label for="info">Information om katten</label>
            <textarea <?php if (isset($errors['info'])) {
                            echo 'class="input-error"';
                        } ?> placeholder="Information om katten som ska adopteras..." id="info" rows="4" cols="50" name="info" value="<?php echo !empty($_POST['info']) ? htmlspecialchars($_POST['info']) : '' ?>;"></textarea>

            <div class="error">
                <?php echo $errors['info'] ?? '' ?>
            </div>
        </div>

        <!-- ----------- -->

        <div class="form-group">
            <label for="picture">Bild på katten</label>
            <input <?php if (isset($errors['picture'])) {
                        echo 'class="input-error"';
                    } ?> placeholder="Filens namn..." type="text" name="picture" id="picture" value="<?php echo !empty($_POST['picture']) ? htmlspecialchars($_POST['picture']) : '' ?>" />
            <div class="error">
                <?php echo $errors['picture'] ?? '' ?>
            </div>
        </div>

        <div class="button">
            <input type="submit" value="Skicka" class="btn" name="submit">
        </div>

    </form>
</section>