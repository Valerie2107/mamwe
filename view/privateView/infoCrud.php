<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Info";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($allInfo);
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


<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Contenu</th>
            <th>Date</th>
            <th>Photo</th>
            <th>update</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
    <?php if(isset($allInfo)): 
    foreach ($allInfo as $info): ?>
        <tr>
            <td><?= $info->getMwIdInfo() ?></td>
            <td><?= $info->getMwContentInfo() ?></td>
            <td><?= date('d/m/Y', strtotime($info->getMwDateInfo())) ?></td>
            <td><?= $info->getMwPictureMwIdPicture() ?></td>
            <td>
                <button>
                    <a href="?p=info-update&info-update=<?= $info->getMwIdInfo() ?>">update</a>
                </button>
            </td>
            <td>
                <button class="btn">
                    <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $info->getMwIdInfo() ?>\' ?'); if(a){ document.location = '?p=info&info-delete=<?= $info->getMwIdInfo() ?>'; };" href="#">delete</a>
                </button>
            </td>
        </tr>
    <?php endforeach; 
    endif; ?>
    </tbody>
</table>

<h3>Upload Photo : </h3>
<form action="" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submitPic">
</form>

<h3>Ajout d'information : </h3>
<form action="" method="POST">
    <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
    <label for="info-insert-content">Information : </label>
    <textarea name="info-insert-content" id="mytextarea" ></textarea><br>

    <h4>Photo : </h4>

    <label for="info-insert-pic-title">Titre de la photo : </label>
    <input type="text" name="info-insert-pic-title"><br>

    <label for="info-insert-pic-url">URL de la photo : </label>
<?php if(isset($picUrl)) :?>
    <input type="text" name="info-insert-pic-url" value="<?= $picUrl ?>"><br>
<?php else : ?>
    <input type="text" name="info-insert-pic-url"><br>
<?php endif; ?>

    <label for="info-insert-pic-size">Taille : </label>
    <input type="text" name="info-insert-pic-size"><br>

    <label for="info-insert-pic-position">Position : </label>
    <input type="text" name="info-insert-pic-position"><br>

    <input type="submit" value="envoyer">
</form>


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";