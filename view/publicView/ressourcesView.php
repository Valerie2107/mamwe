<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Liens et ressources";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
    <h1><?= $title ?></h1>
        <p class="intro"><!--class intro voir css LO-->Vous retrouverez ici une mine d'informations sur tous les thèmes qui touchent à la naissance de la préconception à la puériculture en passant par la parentalité.</p>
        <div class="empty"></div>
    <div>
        <?php
            // on boucle sur les catégories :
                foreach($getAllCateg as $categ){
                    // on affiche le titre de la catég :
                    echo "<h2 class='h2_ressources'> categ : " . $categ -> getMwTitleCategory() . "</h2><br>"; 
                    // on récupère son ID :
                    $categId = $categ->getMwIdCategory();
        ?>
    
        <section>
            <?php
            // on boucle sur la sous categ:$                
                foreach($getAllSub as $sub){
                    // on recupère l'ID:
                    $subId = $sub -> getMwIdSubCategory();
                    
                    // On recupère toutes les ressources avec les ID des categ et sous categ en même temps :
                    $getAllByAll = $ressourceManager -> getAllbyAll($categId, $subId);

                    // on verifie getAllByAll est pas vide :
                    if(!empty($getAllByAll)){
                        // on affiche le titre de la sous categ, on l'a mis dans le if comme ça le titre de la sous categ ne s'affiche que s'il y a un article dedans :
                        echo "<h3 class='h3_ressources'> sous category : " . $sub-> getMwTitleSubCategory() . "</h3><br>";
                        // on boucle sur les ressources :
            ?>
        
            <article>
                <?php
                    foreach($getAllByAll as $all){
                        if(!empty($all)){
                            // on affiche les ressources:
                            echo "<p><strong>contenu : " . $all -> getMwTitleRessource() . "</strong></p>"; 
                ?>
                        <div>
                        <?php
                            echo "<p  class='contenu_ressources'>" . $all -> getMwContentRessource() . "</p>"; 
                            if (!empty($all->getMwPictureMwIdPicture())){
                        ?>
                            <!-- on recupère les images dans une balise html-->  
                            <img src="<?= $pictureManager -> getOneById($all -> getMwPictureMwIdPicture()) ->getMwUrlPicture() ?>" class="img_ressources"><br>
                        <?php
                        
                        }
                        ?>
                        </div>
                            <div>
                                <?php
                                if ($all->getMwSubCategory()==1){
                                    ?>
                                    
                                    <a target='_blank' href="<?= $all -> getMwUrlRessource()?>"><img src="asset/icon/basket.svg" height="25px"></a>
                            
                                <?php

                                }else{

                                // récupération des url vers les différents sites des ressources
                                echo "<a target='_blank' href='". $all -> getMwUrlRessource() ."'>" . $all -> getMwUrlRessource() . "</a></div><div class='empty'></div>"; 
                                }
                                ?>
                                </div>
                                <?php
                        }
                    }
                    ?>
                    </article>
                    <?php
            }
        }
        ?>
        </section>
        <?php
    }
    ?>
    </div>
                            
                        

</main>
<?php
// FOOTER
include_once "../view/include/footer.php";
