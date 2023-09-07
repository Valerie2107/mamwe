<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Mise à jour ressource";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($ressourceUpdateMap);
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
    <label for="mw_update_title_ressource">Title:</label><br>
    <input type="text" id="mw_update_title_ressource" name="mw_update_title_ressource" value="<?= $ressourceById -> getMwTitleRessource() ?>"><br>

    
    <label for="mw_update_content_ressource">Contenu:</label><br>
    <textarea name="mw_update_content_ressource" id="mw_update_content_ressource">
        <?= $ressourceById->getMwContentRessource() ?>
    </textarea><br>

    <label for="mw_update_url_ressource">Lien URL:</label><br>
    <input type="text" id="mw_update_url_ressource" name="mw_update_url_ressource" value="<?= $ressourceById -> getMwUrlRessource() ?>"><br>

    <label for="mw_update_date_ressource">Date:</label><br>
    <input type="text" id="mw_update_date_ressource" name="mw_update_date_ressource" value="<?= date('d/m/Y', strtotime($ressourceById -> getMwDateRessource())) ?>"><br>

    <label for="mw_update_category_ressource">Catégories : </label><br>
    <!-- Select pour les catégories existantes -->
    <select name="mw_update_category_ressource" id="mw_update_category_ressource">
        <option value="<?= $ressourceById -> getMwCategory() ?>"><?= $ressourceManager->getCategById($ressourceById -> getMwCategory())->getMwTitleCategory()  ?></option>
        <?php foreach($allCategory as $category):?>
            <option value="<?= $category->getMwIdCategory()?>">
                <?= $category->getMwTitleCategory()?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- Select pour les sous catégories existantes -->
    <label for="mw_update_sub_ressource">Sous-Catégory : </label><br>
    <select name="mw_update_sub_ressource" id="mw_update_sub_ressource">
    <option value="<?= $ressourceById -> getMwSubCategory() ?>"><?= $ressourceManager->getSubById($ressourceById -> getMwSubCategory())->getMwTitleSubCategory() ?></option>
    <?php foreach($allSubCateg as $subCateg):?>
            <option value="<?= $subCateg->getMwIdSubCategory() ?>">
                <?= $subCateg->getMwTitleSubCategory() ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <!-- CREER UNE NOUVELLE CATEGORIE -->
    <label for="mw_insert_category">Nouvelle catégorie</label><br>
    <input type="text" id="mw_insert_category" name="mw_insert_category" placeholder="nom de la nouvelle catégorie"><br>

    <label for="mw_insert_sub">Nouvelle sous catégorie</label><br>
    <input type="text" id="mw_insert_sub" name="mw_insert_sub" placeholder="nom de la nouvelle sous catégorie"><br>


        <!-- on vérifie si y'a une photo et on peut l'éditer -->
        <?php if(isset($pictureById)) : ?>
            <h4>Photo : </h4>
            <label for="mw_update_title_pic">Photo titre:</label><br>
            <input type="text" id="mw_update_title_pic" name="mw_update_title_pic" value="<?= $pictureById-> getMwTitlePicture() ?>"><br>

            <label for="mw_update_url_pic">Photo url:</label><br>
            <input type="text" id="mw_update_url_pic" name="mw_update_url_pic" value="<?= $pictureById-> getMwUrlPicture() ?>"><br>
            
            <label for="mw_update_size_pic">Photo taille:</label><br>
            <input type="text" id="mw_update_size_pic" name="mw_update_size_pic" value="<?= $pictureById-> getMwSizePicture() ?>"><br>

            <label for="mw_update_position_pic">Photo position:</label><br>
            <input type="text" id="mw_update_position_pic" name="mw_update_position_pic" value="<?= $pictureById-> getMwPositionPicture() ?>"><br>
        <?php else : ?>
        <!-- sinon on peut en rajouter une : -->
            <h4>Nouvelles photo : </h4>
            <label for="mw_insert_title_pic">Photo titre:</label><br>
            <input type="text" id="mw_insert_title_pic" name="mw_insert_title_pic" placeholder="Entrez titre de la photo"><br>

            <label for="mw_insert_url_pic">Photo url:</label><br>
            <input type="text" id="mw_insert_url_pic" name="mw_insert_url_pic" placeholder="Entrez l'Url de la photo"><br>
            
            <label for="mw_insert_size_pic">Photo taille:</label><br>
            <input type="text" id="mw_insert_size_pic" name="mw_insert_size_pic" placeholder="Entrez taille"><br>

            <label for="mw_insert_position_pic">Photo position:</label><br>
            <input type="text" id="mw_insert_position_pic" name="mw_insert_position_pic" placeholder="Entrez position"><br>
        <?php endif; ?> 
    <input type="submit" value="Submit">   
</form>  


<!-- FOOTER
<?php

include_once "../view/include/footer.php";