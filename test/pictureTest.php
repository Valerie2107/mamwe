<?php

use model\mappingClass\MappingPicture;


// require de la config:
require_once "../config.php";


// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});

try{
$test1 = new MappingPicture([
    "mwIdPicture" => 1,
    "mwTitlePicture" => "test",
    "mwUrlPicture" => "test",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 1,
    "mwArticleMwIdArticle" => 1
]);
}catch(Exception $e ){
    $e->getMessage();
}



try{
    $test2 = new MappingPicture([
        "mwTitlePicture" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret  ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfzertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgt",
    ]);
}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";

