<?php

use model\managerClass\ManagerPicture;
use model\mappingClass\MappingPicture;
use model\managerClass\ManagerArticle;


// require de la config:
require_once "../config.php";


// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});

try {
    
    $db = new PDO(DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,DB_LOGIN,DB_PWD);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
}catch(Exception $e){
    
    //die($e->getMessage());
    echo $e->getMessage();
    echo "<br>";
}

try{
$test1 = new MappingPicture([
    "mwTitlePicture" => "test",
    "mwUrlPicture" => "test",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 1,
    "mwArticleMwIdArticle" => null,
]);
}catch(Exception $e ){
    $e->getMessage();
}

var_dump($test1);



$testManagerPic = new ManagerPicture($db);

var_dump($testManagerPic);
$getAllPic = $testManagerPic -> getAll();
// var_dump($getAllPic);

try{

    $insertPic = $testManagerPic -> insertPicture($test1);
}catch(Exception $e){
    $e->getMessage();
}

var_dump($insertPic);

// $getPicById = $testManagerPic -> getOneById(2);
// // $deletePic = $testManagerPic -> deletePicture(87);
// $updatePic = $testManagerPic -> updatePicture("test update", "on a essayé", 1, 1, 128);

// $articlePic = new ManagerArticle($db);
// $art1 = $articlePic -> getAllArticlesWithPictures($db);

// foreach($art1 as $art){
//     echo $art -> getMwTitleArt();
// }

// var_dump($updatePic, $articlePic, $art1);
