<?php
if (isset($_POST['adopt'])) {
    $id_to_adopt = $_POST['id_to_adopt'];
    $name_to_adopt = $_POST['name_to_adopt'];
    $picture_to_adopt = $_POST['picture_to_adopt'];
    $breed_to_adopt = $_POST['breed_to_adopt'];
    $info_to_adopt = $_POST['info_to_adopt'];

    /*  try {
        $query = "DELETE FROM cats WHERE cats_id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute(array($id_to_adopt));
        $cat = $stmt->fetch();
    } catch (PDOException $ex) {
        echo ($ex->getMessage());
    }

    $pdo = null; */
}

include("templates/header.php");
?>

<div class="container">
    <?php if ($id_to_adopt) : ?>
        <h3>Det finns en katt</h3>

    <?php else : ?>
        <h3>Det finns ingen katt med det id-numret</h3>
    <?php endif ?>

</div>