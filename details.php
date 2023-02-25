<?php
include('config/db_connect.php');

/* Kollar efter get request, försöker hämta id:t */

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    $query = "SELECT * FROM cats WHERE cats_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute(array($id));
    $cat = $stmt->fetch();


    $pdo = null;
}

/* inkluderar header.php */
include("templates/header.php");
?>
<div class="container">
    <!-- koll -->
    <?php if ($cat) : ?>
        <h2><?php echo ($cat['cats_name']); ?></h2>
        <div class="cat-details">
            <div class="cat-img">
                <img src="img/<?php echo htmlspecialchars($cat['cats_picture']); ?>" alt="<?php echo htmlspecialchars($cat['cats_name']); ?>" width="400" height="400">
            </div>
            <div class="cat-info">
                <p><b>Ras: </b><?php echo $cat['cats_breed']; ?></p>
                <p><b>Information: </b><?php echo $cat['cats_info']; ?></p>
            </div>
        </div>

        <!-- adoptionsformulär -->
        <form action="adopt.php" method="POST">
            <input type="hidden" name="id_to_adopt" value="<?php echo ($cat['cats_id']) ?>">
            <input type="hidden" name="name_to_adopt" value="<?php echo ($cat['cats_name']) ?>">
            <input type="hidden" name="picture_to_adopt" value="<?php echo ($cat['cats_picture']) ?>">
            <input type="hidden" name="breed_to_adopt" value="<?php echo ($cat['cats_breed']) ?>">
            <input type="hidden" name="info_to_adopt" value="<?php echo ($cat['cats_info']) ?>">

            <div class="btn-group login-person">
                <input type="submit" class="btn" name="adopt" value="adoptera">
                <a href="index.php" class="btn-back button">
                    Gå tillbaka <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        </form>

    <?php else : ?>
        <h5>Det finns ingen katt med id-nummer <?php echo ($id) ?></h5>
    <?php endif ?>
</div>

<?php include('templates/footer.php'); ?>