<?php

use model\mappingClass\MappingRessource;


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

try {
    $test1 = new MappingRessource([
        "mwIdRessource" => 1,
        "mwTitleRessource"=> "titre",
        "mwContentRessource" => "text blabla",
        "mwDateRessource" => "20/10/1983",
        "mwPictureMwIdPicture" => 1,
        "mwCategoryRessourceMwCategoryId" => 1,
    ]);
}catch(Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1);
echo "</pre>";

?>

