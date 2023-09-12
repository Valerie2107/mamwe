<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Ressource";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($allRessource);
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

<!-- Formulaire primitif pour tester le Controller, démerdez vous maintenant : -->
<form action="" method="POST">
    <input type="text" name="ressource-insert-title" placeholder="titre"><br>
    <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
    <textarea name="ressource-insert-content" id="mytextarea" ></textarea>
    <input type="text" name="ressource-insert-url" placeholder="Lien URL"><br>
    <input type="date" name="ressource-insert-date" placeholder="Date"><br>

    <!-- Select pour les catégories existantes -->
    <select name="ressource-insert-categ" id="ressource-insert-categ">
        <option value="null"> - </option>
        <?php foreach($allCategory as $category):?>
            <option value="<?= $category->getMwIdCategory()?>">
                <?= $category->getMwTitleCategory()?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Select pour les sous catégories existantes -->
    <select name="ressource-insert-subcateg" id="ressource-insert-subcateg">
    <option value="null"> - </option>
    <?php foreach($allSubCateg as $subCateg):?>
            <option value="<?= $subCateg->getMwIdSubCategory() ?>">
                <?= $subCateg->getMwTitleSubCategory() ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <input type="text" name="ressource-new-categ" id="ressource-new-categ" placeholder="Nouvelle catégorie">
    <input type="text" name="ressource-new-subcateg" id="ressource-new-subcateg" placeholder="Nouvelle sous-catégorie">

    <h4>Photo : </h4>
    <input type="text" name="ressource-insert-pic-title" placeholder="titre photo"><br>
    <?php if(isset($picUrl)) :?>
        <label for="ressource-insert-pic-url">URL de la photo : </label>
        <input type="text" name="ressource-insert-pic-url" value="<?= $picUrl ?>"><br>
    <?php else : ?>
        <label for="ressource-insert-pic-url">URL de la photo : </label>
        <input type="text" name="ressource-insert-pic-url"><br>
    <?php endif; ?>
    <input type="text" name="ressource-insert-pic-size" placeholder="taille"><br>
    <input type="text" name="ressource-insert-pic-position" placeholder="position">
    <input type="submit" value="envoyer">
</form>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Contenu</th>
            <th>Lien URL</th>
            <th>Date</th>
            <th>Catégorie</th>
            <th>Sous-catégorie</th>
            <th>Photo</th>
            <th>update</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
    <?php if(isset($allRessource)): 
    foreach ($allRessource as $ressource): ?>
        <tr>
            <td><?= $ressource->getMwIdRessource() ?></td>
            <td><?= $ressource->getMwTitleRessource() ?></td>
            <td><?= $ressource->getMwContentRessource() ?></td> 

            <?php if($ressource->getMwUrlRessource() !== null) :?>
                <td><?= $ressource->getMwUrlRessource() ?></td>
            <?php else : ?>
                <td>VIDE</td>
            <?php endif; ?>

            <td><?= $ressource->getMwDateRessource() ?></td>
            <td><?= $ressourceManager->getCategById($ressource->getMwCategory())->getMwTitleCategory() ?></td>
            <td><?= $ressourceManager->getSubById($ressource->getMwSubCategory())->getMwTitleSubCategory() ?></td>

            <?php if($ressource->getMwPictureMwIdPicture() !== null) :?>
                <td><?= $ressource->getMwPictureMwIdPicture() ?></td>
            <?php else : ?>
                <td>VIDE</td>
            <?php endif; ?>
            
            <td>
                <button>
                    <a href="?p=ressource-update&ressource-update=<?= $ressource->getMwIdRessource() ?>">update</a>
                </button>
            </td>
            <td>
                <button class="btn">
                    <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $ressource->getMwIdRessource() ?>\' ?'); if(a){ document.location = '?p=ressourceCrud&ressource-delete=<?= $ressource->getMwIdRessource() ?>'; };" href="#">delete</a>
                </button>
            </td>
        </tr>
    <?php endforeach; 
    endif; ?>
    </tbody>
</table>





<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";