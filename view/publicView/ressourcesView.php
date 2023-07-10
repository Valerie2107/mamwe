<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Liens et ressources";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<h1><?= $title ?></h1>

<?php
// on boucle sur les catégories :
foreach($getAllCateg as $categ){

    // on affiche le titre de la catég :
    echo "<h1> categ : " . $categ -> getMwTitleCategory() . "<br><br>"; 
    // on récupère son ID :
    $categId = $categ->getMwIdCategory();

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
            foreach($getAllByAll as $all){
                if(!empty($all)){
                    // on affiche les ressources:
                    echo "<p>contenu : " . $all -> getMwTitleRessource() . "<p><br>"; 
    
                }
            }
        }
    }
}



// FOOTER
include_once "../view/include/footer.php";
