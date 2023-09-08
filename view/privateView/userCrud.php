<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Utilisateur";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($allHome);
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

<form action="" method="POST" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submitPic">
</form>

<form action="" method="POST">
    <label for="mw_update_home">Texte de présentation : </label><br>
    <textarea name="mw_update_home" id="mytextarea" ><?= $allHome -> getMwContentHomepage() ?></textarea><br>

    <label for="mw_update_pic_home">Photo : </label><br>
    <input type="text" id="mw_update_pic_home" name="mw_update_pic_home" value="<?= $allHome -> getPicture() ?>"><br>

    <input type="submit" value="Submit">    
</form> 

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";