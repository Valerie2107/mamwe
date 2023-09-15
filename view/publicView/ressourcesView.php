<?php
// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Liens et ressources";
// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// DECLARATION DE FUNCTIONS 
function displayTitle($title, $heading){
	echo '<' . $heading . ' id="' . $title . '"' . ' class="' . $heading . '_ressources">' . $title . '</' . $heading . '>';
}
?>
<!-- HTML -->
<main>
    <h1><?= $title ?></h1>
        <p class="intro"><!--class intro voir css Livre d'Or-->
                Vous retrouverez ici une mine d'informations sur tous les thèmes qui touchent à la naissance de la préconception à la puériculture en passant par la parentalité.
        </p>
	<div class="empty"></div>

    <?php
        // on boucle sur les catégories
        foreach($getAllCateg as $categ){
            // Début de la section pour une catégorie trouvée
            echo '<section>';
            // on affiche le titre de la catég : 
            displayTitle($categ -> getMwTitleCategory(), "h2");
            // on récupère son ID :
            $categId = $categ->getMwIdCategory();
            // Ici, nous sommes dans la section, après le titre.
            // on boucle sur la sous categ:$                
            foreach($getAllSub as $sub){
                // on recupère l'ID:
                $subId = $sub -> getMwIdSubCategory();
                // On recupère toutes les ressources avec les ID des categ et sous categ en même temps :
                $getAllByAll = $ressourceManager -> getAllbyAll($categId, $subId);
                // on verifie getAllByAll est non vide :
                if(!empty($getAllByAll)){
                    // on affiche le titre de la sous categ, on l'a mis dans le if comme ça le titre de la sous categ ne s'affiche que s'il y a un article dedans :
                    displayTitle($sub -> getMwTitleSubCategory(), "h3");
                    // on boucle sur les ressources :
                    if ($subId==1){
                        echo '<article class="ressources">';
                    }else{
                        echo '<article>';
                    }                   
                    foreach($getAllByAll as $all){
                        if(!empty($all)){
                            echo '<div class="oneBlocOfData">';
                            // === ONE BLOC OF DATA ===============================================================
                            // on affiche les ressources:
                            echo "<p><strong> " . $all -> getMwTitleRessource() . "</strong></p>"; 
                            echo "<p  class='contenu_ressources'>" . $all -> getMwContentRessource() . "</p>";
                            // S'il y a une image
                            if (!empty($all->getMwPictureMwIdPicture())){
                                // on trouve le chemin de l'image puis on l'insert dans le html
                                $imgPath =  $pictureManager -> getOneById($all -> getMwPictureMwIdPicture()) ->getMwUrlPicture();
                                echo '<img src="' . $imgPath . '" class="img_ressources">';				
                            }
                            // Insertion d'une DIV contenant un unique lien (avec ou sans icone)
                            echo '<div>';
                            if ($all->getMwSubCategory()==1){
                                echo '<a target="_blank" href=" ' . $all -> getMwUrlRessource(). ' "><img src="asset/icon/basket.svg" height="25px"></a>';
                            }else{
                                echo '<a target="_blank" href="' . $all -> getMwUrlRessource() . '">' . $all -> getMwUrlRessource() . '</a>'; 
                            }
                            echo '</div>';
                            // === END ONE BLOC OF DATA ===============================================================
                            echo '<div class="empty"></div>';
                            echo '</div>'; // end of div.oneBlocOfData                    
                        } // end if(!empty($all))
                    } // end foreach($getAllByAll as $all)
                    echo '</article>'; // end of article.ressources
                    echo '<div class="empty"></div>';                
                } // end If !empty(getAllByAll)
            } // end foreach($getAllSub as $sub)
        // Fin de la section avant de passer à la catégorie suivante
            echo '</section>';
    } // end foreach($getAllCateg as $categ)
    ?>
</main>
<?php
// FOOTER
include_once "../view/include/footer.php";
?>