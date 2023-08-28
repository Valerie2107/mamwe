<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Administration";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<!-- le rest : -->

<form action="" method="POST">
    <label for="mw_update_title_art">Title:</label><br>
    <input type="text" id="mw_update_title_art" name="mw_update_title_art" value="<?= $articleById->getMwTitleArt() ?>"><br>

    <label for="mw_update_content_art">Content:</label><br>
    <textarea id="mw_update_content_art" name="mw_update_content_art">
        <?= $articleById-> getMwContentArt()?>
    </textarea><br>

    <label for="mw_update_visible_art">Visible:</label><br>
    <select id="mw_update_visible_art" name="mw_update_visible_art" value="<?= $articleById->getMwVisibleArt() ?>">
        <option value="1">Visible</option>
        <option value="0">Non-visible</option>
    </select><br>

    <label for="mw_update_picture_art">Photo:</label><br>
    <input type="text" id="mw_update_picture_art" name="mw_update_picture_art" value="<?= $articleById->getPicture() ?>"><br>
    
    <label for="mw_update_section_mw_update_id_section">Section : </label><br>
    <input type="number" id="mw_update_section_mw_update_id_section" name="mw_update_section_mw_update_id_section" value="<?= $articleById ->getMwSectionMwIdSection() ?>"><br>
    
    <div id="add-picture-article">
        <!-- Picture fields will be added here -->
    </div><hr>
    
    <button type="button" id="addPicture">Add Picture</button>
    <input type="submit" value="Submit">
     
</form>


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";