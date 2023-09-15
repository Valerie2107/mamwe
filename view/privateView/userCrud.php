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

<div class="container-crud">
    <h3><?= $title ?></h3>
    <div class="response">
        <?php if(isset($response)) : ?>
            <p><?= $response ?></p>
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
    
    <div class="crud-form">
        <h4>Upload Photo : </h4>
        <form action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <button type="submit" name="submitPic">Upload image</button>
        </form>

        <hr class="separate-pic-form">
        
        <form action="" method="POST">
            <label for="mw_update_home">Texte de présentation : </label><br>
            <textarea name="mw_update_home" id="mytextarea" ><?= $allHome -> getMwContentHomepage() ?></textarea><br>
        
            <label for="mw_update_pic_home">URL de la photo : </label>
        <?php if(isset($picUrl)) :?>
            <input type="text" id="mw_update_pic_home" name="mw_update_pic_home" value="<?= $picUrl ?>"><br>
        <?php else : ?>
            <input type="text" id="mw_update_pic_home" name="mw_update_pic_home" value="<?= $allHome -> getPicture() ?>"><br>
        <?php endif; ?>
        
        <button>Enregistrer</button>   
        </form> 
    </div>
</div>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";