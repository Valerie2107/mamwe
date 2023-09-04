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
                    <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $ressource->getMwIdRessource() ?>\' ?'); if(a){ document.location = '?p=ressource&ressource-delete=<?= $ressource->getMwIdRessource() ?>'; };" href="#">delete</a>
                </button>
            </td>
        </tr>
    <?php endforeach; 
    endif; ?>
    </tbody>
</table>

<form action="" method="POST">
    <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
    <textarea name="info-insert-content" id="mytextarea" ></textarea>
    <input type="text" name="info-insert-pic-title" placeholder="titre photo"><br>
    <input type="text" name="info-insert-pic-url" placeholder="url photo"><br>
    <input type="text" name="info-insert-pic-size" placeholder="taille"><br>
    <input type="text" name="info-insert-pic-position" placeholder="position">
    <input type="submit" value="envoyer">
</form>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";