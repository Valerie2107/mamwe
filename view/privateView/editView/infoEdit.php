<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Mise à jour des informations";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

// var_dump($infoById, $pictureByinfoId);
?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<!-- le rest : -->

<?php if(isset($response)) : ?>
    <h3><?= $response ?></h3>
<?php endif; ?>



<form action="" method="POST">
    <label for="mw_update_date_info">Date:</label><br>
    <input type="text" id="mw_update_date_info" name="mw_update_date_info" value="<?= $infoById -> getMwDateInfo() ?>"><br>
    
    <label for="mw_update_content_info">Contenu:</label><br>
    <textarea name="mw_update_content_info" id="mw_update_content_info">
        <?= $infoById->getMwContentInfo() ?>
    </textarea><br>

    <h4>Photo : </h4>
    <label for="mw_update_title_pic">Photo titre:</label><br>
    <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictures-> getMwTitlePicture() ?>"><br>

    <label for="mw_update_url_pic">Photo url:</label><br>
    <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictures-> getMwUrlPicture() ?>"><br>
    
    <label for="mw_update_size_pic">Photo taille:</label><br>
    <input type="text" id="mw_update_size_pic" name="mw_update_size_pic" value="<?= $pictures-> getMwSizePicture() ?>"><br>

    <label for="mw_update_position_pic">Photo position:</label><br>
    <input type="text" id="mw_update_position_pic" name="mw_update_position_pic" value="<?= $pictures-> getMwPositionPicture() ?>"><br>

    <input type="submit" value="Submit">    
</form> 


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
