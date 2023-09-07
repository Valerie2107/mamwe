<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Liens et ressources";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<h1><?= $title ?></h1>
    <div>
        <p>Vous retrouverez ici une mine d'informations sur tous les thèmes qui touchent à la naissance de la préconception à la puériculture en passant par la parentalité.</p>
    </div>
    <div class="empty"></div>
<div>
    <div>
<?php
// on boucle sur les catégories :

foreach($getAllCateg as $categ){

    // on affiche le titre de la catég :
    echo "<h2 class=''> categ : " . $categ -> getMwTitleCategory() . "<br><br>"; 
    // on récupère son ID :
    $categId = $categ->getMwIdCategory();
?>
</div>
<div>
    <?php
    // on boucle sur la sous categ:
    
    foreach($getAllSub as $sub){
        // on recupère l'ID:
        $subId = $sub -> getMwIdSubCategory();
        
        // On recupère toutes les ressources avec les ID des categ et sous categ en même temps :
        $getAllByAll = $ressourceManager -> getAllbyAll($categId, $subId);

        // on verifie getAllByAll est pas vide :
        if(!empty($getAllByAll)){
            // on affiche le titre de la sous categ, on l'a mis dans le if comme ça le titre de la sous categ ne s'affiche que s'il y a un article dedans :
            echo "<h3> sous category : " . $sub-> getMwTitleSubCategory() . "</h3><br><br>";
            // on boucle sur les ressources :
       ?>
          </div>
         <div>
          <?php
            
            foreach($getAllByAll as $all){
                if(!empty($all)){
                    // on affiche les ressources:
                    echo "<p><strong>contenu : " . $all -> getMwTitleRessource() . "</strong><p><br>"; 
                    ?>
                    <div class="grid_ressources">
                        <?php
                    echo "<p class=''>" . $all -> getMwContentRessource() . "<p><br>"; 
                    if (!empty($all->getMwPictureMwIdPicture())){
                        ?>
                        <img src="<?= $pictureManager -> getOneById($all -> getMwPictureMwIdPicture()) ->getMwUrlPicture() ?>" alt=""> <br>
                        <?php
                      echo "<p>" . $pictureManager -> getOneById($all -> getMwPictureMwIdPicture()) ->getMwUrlPicture() . "<p><br>"; 
                    }
                    echo "<p>" . $all -> getMwUrlRessource() . "<p><br>"; 
                      
                }
            }
        }
    }
}
?>
</div>
</div>
</div>
</main>
<?php
// FOOTER
include_once "../view/include/footer.php";
