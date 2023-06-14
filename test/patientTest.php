<?php

use model\mappingClass\MappingPatient;


// require de la config:
require_once "../config.php";


// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});

try{
$test1 = new MappingPatient([
    "mwIdPatient" => 1,
    "mwNamePatient" => "test",
    "mwSurnamePatient" => "test",
    "mwBirthdatePatient" => "yolo",
    "mwMailPatient" => "test@hotmail.com",
    "mwPhonePatient"=> 1
]);
}catch(Exception $e ){
    $e->getMessage();
}



try{
    $test2 = new MappingPatient([
        "mwTitleSect" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgte",
    ]);
}catch (Exception $e){
    $e->getMessage();
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";

