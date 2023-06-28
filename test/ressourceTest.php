<?php

use model\mappingClass\MappingRessource;
use model\mappingClass\MappingCategoryRessource;
use model\mappingClass\MappingSubCategoryRessource;
use model\managerClass\ManagerRessource;


// require de la config:
require_once "../config.php";


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});

// Connexion à la DB :
try {
    
    $db = new PDO(DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,DB_LOGIN,DB_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}catch(Exception $e){
    
    //die($e->getMessage());
    echo $e->getMessage();
    echo "<br>";
}

#########################
#  mapping ressource    #
#########################

try{
    $mapRess = new MappingRessource([
        'mwIdRessource' => 1000,
        'mwTitleRessource' => "titre1",
        'mwContentRessource' => "la la la la lal al al la la la la",
        'mwUrlRessource' => "url1",
        'mwDateRessource' => "2001-01-01",
        'mwCategory' => 1,
        'mwSubCategory' => 1,
        'mwPictureMwIdPicture' => 1,
    ]);
}catch(Exception $e){
    $e -> getMessage();
}

// var_dump($mapRess);

// // mapping category et sous category:
// try{
//     $mapCateg = new MappingCategoryRessource([
//         "mwIdCategory" => 1,
//         "mwTitleCategory" => "toto",
//     ]);
// }catch(Exception $e){
//     $e -> getMessage();
// }

// var_dump($mapCateg);

// try{
//     $mapSubCateg = new MappingSubCategoryRessource([
//         "mwIdSubCategory" => 1,
//         "mwTitleSubCategory" => "toto",
//     ]);
// }catch(Exception $e){
//     $e -> getMessage();
// }

// var_dump($mapSubCateg);
// TOUT EST BON!



##################
# Test Manager   #
##################

$managerTest = new ManagerRessource($db);
// var_dump($managerTest);

// on recupère toutes les catégories:
$getAllCateg = $managerTest -> getAllCateg();

// on récupère toutes les sous catégories :
$getAllSub = $managerTest -> getAllSubCateg();


// on boucle sur les catégories :
foreach($getAllCateg as $categ){

    // on affiche le titre de la catég :
    echo "<h1> categ : " . $categ -> getMwTitleCategory() . "<br><br>"; 
    // on récupère son ID :
    $categId = $categ->getMwIdCategory();

    // on boucle sur la sous categ:
    foreach($getAllSub as $sub){
        // on affiche:
        echo "<h3> sous category : " . $sub-> getMwTitleSubCategory() . "</h3><br><br>";
        // on recupère l'ID:
        $subId = $sub -> getMwIdSubCategory();

        // On recupère toutes les ressources avec les ID des categ et sous categ en même temps :
        $getAllByAll = $managerTest -> getAllbyAll($categId, $subId);

        // on boucle sur les ressources :
        foreach($getAllByAll as $all){
            if(!empty($all)){
                // on affiche les ressources:
                echo "<p>contenu : " . $all -> getMwTitleRessource() . "<p><br>"; 

            }
        }
    }
}

