<?php

include('config/db_connect.php');

require('res/catValidator.php');
require('res/catsList.php');

$dir = "img";
$files = scandir($dir);

$errors = [];
if (isset($_POST['submit'])) {

  // Validera katt entries
  $cat_validation = new CatValidator($_POST);
  $errors = $cat_validation->validateForm();

  $nameError = $errors['name'] ?? '';
  $breedError = $errors['breed'] ?? '';
  $infoError = $errors['info'] ?? '';
  $pictureError = $errors['picture'] ?? '';

  if (array_filter($errors)) {
    //echo 'errors in form';
  } else {
    // escape sql chars
    $name = htmlspecialchars($_POST["name"]);
    $breed = htmlspecialchars($_POST["breed"]);
    $info = htmlspecialchars($_POST["info"]);
    $picture = htmlspecialchars($_POST["picture"]);

    // skapar SQL 
    $sql = "INSERT INTO `cats` (cats_name, cats_breed, cats_info, cats_picture) VALUES(?, ?, ?, ?);";
    $stmt = $pdo->prepare($sql);


    // sparar till databasen och gör en koll
    if (!$stmt->execute(array($name, $breed, $info, $picture))) {
      $stmt = null;
      header("location: index.php?error=stmtfailed");
      exit();
    } else {
      $stmt = null;
      header('Location: index.php');
    }
  }
} // avslutar POST check

?>
<!-- inkluderar header.php för denna sida -->
<?php include('templates/header.php'); ?>

<section class="container add">
  <form id="cat-form" class="add-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <h4 class="">Lägg till en katt</h4>
    <!-- lägga till ett namn för den nya katten -->
    <div class="form-group">
      <label for="name">Kattens namn</label>
      <!-- gör en koll för att det blir rätt input för 'name' -->
      <input <?php if (isset($errors['name'])) {
                echo 'class="input-error"';
              } ?> placeholder="Fyll i kattens namn..." type="text" name="name" id="name" value="<?php echo !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
      <div class="error">
        <?php echo $errors['name'] ?? '' ?>
      </div>
    </div>
    <!-- lägga till ras för den nya katten -->
    <div class="form-group">
      <label for="breed">Kattens ras</label>
      <!-- select för att man ska välja mellan befintliga raser -->
      <!-- koll för error på ras -->
      <select <?php if (isset($errors['breed'])) {
                echo 'class="input-error"';
              } ?> form="cat-form" name="breed" id="breed">
        <option value="" disabled selected>Välj ras</option>
        <!-- loopar igenom listan  -->
        <!-- konkantenering -->
        <!-- för användandet av variabel i php -->

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
    <!-- lägga till information om katten -->
    <div class="form-group">
      <label for="info">Information om katten</label>
      <!-- koll ifall det blir fel input -->
      <textarea <?php if (isset($errors['info'])) {
                  echo 'class="input-error"';
                } ?> placeholder="Information om katten som ska adopteras..." id="info" rows="4" cols="50" name="info"></textarea>

      <div class="error">
        <?php echo $errors['info'] ?? '' ?>
      </div>
    </div>
    <!-- lägga till bild på nya katten -->
    <div class="form-group">
      <label for="picture">Bild på katten</label>
      <!-- koll att det inte blir fel input -->
      <select <?php if (isset($errors['picture'])) {
                echo 'class="input-error"';
              } ?> name="picture" id="picture">
        <option value="" disabled selected>Välj bildfil</option>
        <!-- loopar igenom en lista med alla filer -->
        <!-- vill skriva ut alla filer i listan till select lista -->
        <?php foreach ($files as $file) {
          if ($file == "." || $file == "..") continue;

          echo ("<option value='" . $file . "'>" . $file . "</option>");
        } ?>
      </select>

      <div class="error">
        <?php echo $errors['picture'] ?? '' ?>
      </div>
    </div>

    <!-- knapp för att lägga till nya katten -->
    <div class="btn-group add-cat">

      <input type="submit" name="submit" value="Skicka" class="btn">
      <!-- knapp för att gå tillbaka till första sidan -->
      <a href="index.php" class="btn-back button">
        Gå tillbaka <i class="fa fa-arrow-right" aria-hidden="true"></i>
      </a>
    </div>


  </form>

</section>

<?php include('templates/footer.php'); ?>