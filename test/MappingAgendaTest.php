<?php

use model\mappingClass\MappingAgenda;


// require de la config:
require_once "../config.php";


// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});

try{
$test1 = new MappingAgenda([
    "mwIdAgenda" => 1,
    "mwDateAgenda" => "test",
    "mwContentAgenda" => "test",
    "mwTitleAgenda" => "test",
    "mwPictureMwIdPicture" => 1
]);
}catch(Exception $e ){
    $e->getMessage();
}



try{
    $test2 = new MappingAgenda([
        "mwTitleSect" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgte",
    ]);
}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";

