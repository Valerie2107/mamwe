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

<div>
    <?php if(isset($response)) : ?>
        <h4><?= $response ?></h4>
    <?php endif; ?>
    
    <?php if(isset($uploadResponse)) : 
            if(is_array($uploadResponse)) :     
                $picUrl = $uploadResponse[1] ?>
                <h4><?= $uploadResponse[0] ?></h4>
            <?php else: ?>
                <h4><?= $uploadResponse ?></h4>
            <?php endif; ?>
    <?php endif; ?>
</div>


<form action="" method="POST">
    <label for="mw_update_date_info">Date:</label><br>
    <input type="text" id="mw_update_date_info" name="mw_update_date_info" value="<?= date('d/m/Y', strtotime($infoById -> getMwDateInfo())) ?>"><br>
    
    <label for="mw_update_content_info">Contenu:</label><br>
    <textarea name="mw_update_content_info" id="mw_update_content_info">
        <?= $infoById->getMwContentInfo() ?>
    </textarea><br>

    <h4>Photo : </h4>
    <label for="mw_update_title_pic">Photo titre:</label><br>
    <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictures-> getMwTitlePicture() ?>"><br>

    <label for="mw_update_url_pic">URL de la photo : </label>
<?php if(isset($picUrl)) :?>
    <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $picUrl ?>"><br>
<?php else : ?>
    <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictures-> getMwUrlPicture() ?>"><br>
<?php endif; ?>
    
    <label for="mw_update_size_pic">Photo taille:</label><br>
    <input type="text" id="mw_update_size_pic" name="mw_update_size_pic" value="<?= $pictures-> getMwSizePicture() ?>"><br>

    <label for="mw_update_position_pic">Photo position:</label><br>
    <input type="text" id="mw_update_position_pic" name="mw_update_position_pic" value="<?= $pictures-> getMwPositionPicture() ?>"><br>

    <input type="submit" value="Submit">    
</form> 


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
