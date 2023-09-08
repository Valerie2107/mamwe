<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Mise à jour agenda";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

// var_dump($agendaById, $pictureByAgendaId);
?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

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


<h3>Upload Photo : </h3>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submitPic">
</form>


<form action="" method="POST">
    <label for="mw_update_title_agenda">Title:</label><br>
    <input type="text" id="mw_update_title_agenda" name="mw_update_title_agenda" value="<?= $agendaById -> getMwTitleAgenda() ?>"><br>

    <label for="mw_update_date_agenda">Date:</label><br>
    <input type="date" id="mw_update_date_agenda" name="mw_update_date_agenda" value="<?= $agendaById -> getMwDateAgenda() ?>"><br>
    
    <label for="mw_update_content_agenda">Contenu:</label><br>
    <textarea name="mw_update_content_agenda" id="mw_update_content_agenda">
        <?= $agendaById->getMwContentAgenda() ?>
    </textarea><br>

    <h4>Photo : </h4>
    <label for="mw_update_title_pic">Photo titre:</label><br>
    <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictureByAgendaId-> getMwTitlePicture() ?>"><br>


    <label for="mw_update_url_pic">URL de la photo : </label>
<?php if(isset($picUrl)) :?>
    <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $picUrl ?>"><br>
<?php else : ?>
    <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictureByAgendaId-> getMwUrlPicture() ?>"><br>
<?php endif; ?>
    
    <label for="mw_update_size_pic">Photo taille:</label><br>
    <input type="text" id="mw_update_size_pic" name="mw_update_size_pic" value="<?= $pictureByAgendaId-> getMwSizePicture() ?>"><br>

    <label for="mw_update_position_pic">Photo position:</label><br>
    <input type="text" id="mw_update_position_pic" name="mw_update_position_pic" value="<?= $pictureByAgendaId-> getMwPositionPicture() ?>"><br>

    <input type="submit" value="Submit">    
</form> 


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
