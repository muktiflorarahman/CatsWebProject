<?php
//inkluderar filen db_connect för att koppla databasen
include("config/db_connect.php");

//skapar en query till databasen
$query = "SELECT * FROM `cats`;";

$stmt = $pdo->prepare($query);
$stmt->execute();
$cats = $stmt->fetchAll();
?>



<!DOCTYPE html>
<html lang="en">

<?php include("templates/header.php"); ?>

<div class="container">
    <h2>Katter utan familj</h2>

    <div class="row">
        <div class="col">

            <?php foreach ($cats as $cat) : ?>

                <div class="card">
                    <div class="card-top">
                        <img src="<?php echo 'img/' . htmlspecialchars($cat['cats_picture']); ?>" alt="<?php echo htmlspecialchars($cat['cats_name']); ?>" width="200" height="200">
                    </div>
                    <div class="card-body">
                        <h3><span>Namn: </span><?php echo htmlspecialchars($cat['cats_name']); ?></h3>
                        <p class="breed"><span>Ras: </span><?php echo htmlspecialchars($cat['cats_breed']); ?></p>
                    </div>

                    <?php if (isset($_SESSION["userid"])) { ?>
                        <div class="card-bottom">
                            <button class="btn-details">
                                <a href="details.php?id=<?php echo $cat['cats_id'] ?>" class="a-details">Info</a>
                            </button>
                        </div>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include('templates/footer.php'); ?>