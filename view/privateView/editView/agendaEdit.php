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

<!-- le rest : -->

<?php if(isset($response)) : ?>
    <h3><?= $response ?></h3>
<?php endif; ?>



<form action="" method="POST">
    <label for="mw_update_title_agenda">Title:</label><br>
    <input type="text" id="mw_update_title_agenda" name="mw_update_title_agenda" value="<?= $agendaById -> getMwTitleAgenda() ?>"><br>

    <label for="mw_update_date_agenda">Date:</label><br>
    <input type="text" id="mw_update_date_agenda" name="mw_update_date_agenda" value="<?= $agendaById -> getMwDateAgenda() ?>"><br>
    
    <label for="mw_update_content_agenda">Contenu:</label><br>
    <textarea name="mw_update_content_agenda" id="mw_update_content_agenda">
        <?= $agendaById->getMwContentAgenda() ?>
    </textarea><br>

    <h4>Photo : </h4>
    <label for="mw_update_title_pic">Photo titre:</label><br>
    <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictureByAgendaId-> getMwTitlePicture() ?>"><br>

    <label for="mw_update_url_pic">Photo url:</label><br>
    <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictureByAgendaId-> getMwUrlPicture() ?>"><br>
    
    <label for="mw_update_size_pic">Photo taille:</label><br>
    <input type="text" id="mw_update_size_pic" name="mw_update_size_pic" value="<?= $pictureByAgendaId-> getMwSizePicture() ?>"><br>

    <label for="mw_update_position_pic">Photo position:</label><br>
    <input type="text" id="mw_update_position_pic" name="mw_update_position_pic" value="<?= $pictureByAgendaId-> getMwPositionPicture() ?>"><br>

    <input type="submit" value="Submit">    
</form> 


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
