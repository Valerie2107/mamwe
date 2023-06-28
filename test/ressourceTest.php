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

// Test Manager :
$managerTest = new ManagerRessource($db);
// var_dump($managerTest);

$getAllRess = $managerTest -> getAll();
$getAllCateg = $managerTest -> getAllCateg();
$getAllSub = $managerTest -> getAllSubCateg();
// var_dump($getAllCateg, $getAllSub);
// var_dump($getAllByAll);

foreach($getAllCateg as $categ){
    echo "category : " . $categ->getMwTitleCategory() . "<br>";
    $getAllByAll = $managerTest -> getAllbyAll($categ->getMwIdCategory());
    foreach($getAllByAll as $all){
        echo "article : " . $all -> getMwTitleRessource() . "<br>";
        echo "sub : " . $all -> getMwSubCategory() . "<br>";
    }
    
}