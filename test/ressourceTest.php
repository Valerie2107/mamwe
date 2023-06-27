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


// mapping ressource :
try {
    $mapRess = new MappingRessource([
        "mwIdRessource" => 1,
        "mwTitleRessource"=> "titre",
        "mwContentRessource" => "hj ioqjdo sjqos jioqs djqiojq dojqsdioqs ioqsj sio",
        "mwUrlRessource" => "lalalalalalalala",
        "mwDateRessource" => "2001-01-01",
        "mwPictureMwIdPicture" => 2,
        "mwSubCategoryRessourceMwIdSubCategoryRessource" => 1,
    ]);
}catch(Exception $e){
    echo $e;
}

// var_dump($mapRess);


// mapping category and subCategory :
$mapCateg = new MappingCategoryRessource([
    "mwCategoryId" =>2,
    "mwCategoryTitle" => "popolmlm",
]);
$mapSubCateg = new MappingSubCategoryRessource([
    "mwSubCategoryId" => 2,
    "mwSubCategoryTitle" => "popolmlm",
]);

// var_dump($mapCateg, $mapSubCateg);


// MANAGER :
$manageRess = new ManagerRessource($db);
// var_dump($manageRess);

// $RessById = $manageRess -> getOneById(4);

$allRess = $manageRess -> getAll();

// foreach($allRess as $item){
//     echo "id : " . $item -> getMwIdRessource() . "<br>";
//     echo "titre : " . $item -> getMwTitleRessource() . "<br>";
//     echo "contenu : " . $item -> getMwContentRessource() . "<br>";
//     if(!empty($item->getMwUrlRessource)){
//         echo "lien : " . $item -> getMwUrlRessource() . "<br>";
//     }
//     echo "date : " . $item -> getMwDateRessource() . "<br>";
//     echo "photo : " . $item -> getMwPictureMwIdPicture(). "<br><hr>";
// }

// var_dump($allRess);

$manageCateg = new ManagerRessource($db);

$allCateg = $manageCateg -> getAllCateg();
foreach($allCateg as $categ){
    echo "category : " . $categ-> getMwCategoryTitle() . "<br>";
}

$manageSub = new ManagerRessource($db);

$allSubs = $manageSub -> getAllSubCateg();
foreach($allSubs as $sub){
    echo "sous category : " . $sub-> getMwTitleSubCategoryRessource() . "<br>";

}
var_dump($allSubs);