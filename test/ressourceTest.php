<?php

use model\managerClass\ManagerPicture;
use model\mappingClass\MappingPicture;
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
#   mapping ressource   #
#########################


$mapRess = new MappingRessource([
    'mwIdRessource' => 1,
    'mwTitleRessource' => "titre1",
    'mwContentRessource' => "la la la la lal al al la la la la",
    'mwUrlRessource' => "url1",
    'mwDateRessource' => "2001-01-01",
    'mwCategory' => 1,
    'mwSubCategory' => 1,
    'mwPictureMwIdPicture' => 1,
]);


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
// foreach($getAllCateg as $categ){

//     // on affiche le titre de la catég :
//     echo "<h1> categ : " . $categ -> getMwTitleCategory() . "<br><br>"; 
//     // on récupère son ID :
//     $categId = $categ->getMwIdCategory();

//     // on boucle sur la sous categ:
//     foreach($getAllSub as $sub){
//         // on recupère l'ID:
//         $subId = $sub -> getMwIdSubCategory();
        
//         // On recupère toutes les ressources avec les ID des categ et sous categ en même temps :
//         $getAllByAll = $managerTest -> getAllbyAll($categId, $subId);

//         // on verifie getAllByAll est pas vide :
//         if(!empty($getAllByAll)){
//             // on affiche le titre de la sous categ, on l'a mis dans le if comme ça le titre de la sous categ ne s'affiche que s'il y a un article dedans :
//             echo "<h3> sous category : " . $sub-> getMwTitleSubCategory() . "</h3><br><br>";
//             // on boucle sur les ressources :
//             foreach($getAllByAll as $all){
//                 if(!empty($all)){
//                     // on affiche les ressources:
//                     echo "<p>contenu : " . $all -> getMwTitleRessource() . "<p><br>"; 
    
//                 }
//             }
//         }
//     }
// }

// test insert :
$picture7 = new MappingPicture([
    "mwIdPicture" => 145,
    "mwTitlePicture" => "test update 2",
    "mwUrlPicture" => "test update 2",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 1,
]); 

$categ7 = new MappingCategoryRessource([
    "mwIdCategory"=> 1,
    "mwTitleCategory" => "Allaitement"
]);

$sub7 = new MappingSubCategoryRessource([
    "mwIdSubCategory"=> 1,
    "mwTitleSubCategory" => "Livre"
]);

$ress7 = new MappingRessource([
    'mwIdRessource' => 98,
    'mwTitleRessource' => "update test",
    'mwContentRessource' => "update test",
    'mwUrlRessource' => "update test",
    'mwDateRessource' => "2001-01-01",
    // s'il y'a un insert de pic, categ ou subcateg ils prendre les valeur de leur ID et on laisse les attributs à zéro pour éviter les erreurs:
    'mwCategory' => 0,
    'mwSubCategory' => 0,
]);

// $insert7 = $managerTest -> insertRessource($picture7, $categ7, $sub7, $ress7);
// var_dump($insert7);

// $update = $managerTest -> updateRessource($picture7, $categ7, $sub7, $ress7);

// $deleteRess = $managerTest -> deleteRessource(97);
// var_dump($deleteRess); 