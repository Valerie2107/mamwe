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
    <label for="mw_update_home">Texte de présentation : </label><br>
    <textarea name="mw_update_home" id="mytextarea" ><?= $allHome -> getMwContentHomepage() ?></textarea><br>

    <label for="mw_update_pic_home">URL de la photo : </label>
<?php if(isset($picUrl)) :?>
    <input type="text" id="mw_update_pic_home" name="mw_update_pic_home" value="<?= $picUrl ?>"><br>
<?php else : ?>
    <input type="text" id="mw_update_pic_home" name="mw_update_pic_home" value="<?= $allHome -> getPicture() ?>"><br>
<?php endif; ?>

    <input type="submit" value="Submit">    
</form> 

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";