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
        "mwDateRessource" => "01/01/2001",
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



