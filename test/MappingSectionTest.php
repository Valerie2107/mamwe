<?php

use model\mappingClass\MappingSection;


// require de la config:
require_once "../config.php";


// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});



$test1 = new MappingSection([
    "mwIdSect" => 1,
    "mwTitleSect" => "test",
    "mwContentSect" => "test",
    "mwVisible" => "test",
    "mwPictureMwIdPicture" => 1
]);

try{
    $test2 = new MappingSection([
        "mwTitleSect" => "pipi",
    ]);

}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";

