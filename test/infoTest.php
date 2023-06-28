<?php

use model\mappingClass\MappingInfo;
use model\managerClass\ManagerInfo;

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

// test des mapping :
try {
    $test1 = new MappingInfo([
        "mwIdInfo" => 1,
        "mwContentInfo" => "text blabla",
        "mwDateInfo" => "20/10/1983",
        "mwPictureMwIdPicture" => 1,
    ]);
}catch(Exception $e){
    echo $e;
}

try{
    $test2 = new MappingInfo([
        "mwTitleSect" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgte",
    ]);
}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1);
echo "</pre>";



// test des manager :
$managerInfo = new ManagerInfo($db);
var_dump($managerInfo);
$getAll = $managerInfo -> getAll();

var_dump($getAll);

foreach($getAll as $event){
    echo $event -> getMwIdInfo();
    echo $event -> getMwContentInfo();  
 echo "date : " . $event -> getMwDateInfo() . "<br>";  

}

$insertI = $managerInfo -> $insertInfo($test1);
var_dump($insertI);