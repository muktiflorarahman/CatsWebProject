<?php 
//inkluderar filen db_connect för att koppla databasen
include("config/db_connect.php"); 

//skapar en query till databasen
$query = "SELECT * FROM `cats`;";

$stmt = $pdo->prepare($query);
$stmt->execute(); 
$cats = $stmt->fetchAll(); 
var_dump($cats); 
?>


<!DOCTYPE html>
<html lang="en">

<?php include("templates/header.php"); ?>

    <h4 class="center">Katter utan familj</h4>

    <div class="container">
        <div class="row">
            <?php foreach($cats as $cat) :?>
                <div class="col">
                    <div class="card">
                        <img src="img/cat-profile.svg" alt="Cat profile" class="cat">
                        <div class="card-content">
                            <h6>
                                <?php echo htmlspecialchars($cat["cats_name"]); ?>
                            </h6>
                            <p>
                            <?php echo htmlspecialchars($cat["cats_breed"]); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>

    <script src="js/main.js"></script>

<?php include("templates/footer.php"); ?>
</html>