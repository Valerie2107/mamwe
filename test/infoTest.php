<?php

use model\mappingClass\MappingInfo;
use model\managerClass\ManagerInfo;
use model\mappingClass\MappingPicture;

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
        "mwContentInfo" => "text gnagnagna",
        "mwDateInfo" => "2022-05-17",
        "mwPictureMwIdPicture" => 1,
    ]);
}catch(Exception $e){
    $e->getMessage();
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
    echo "id : " . $event -> getMwIdInfo() ."<br>";
    echo "contenu : " . $event -> getMwContentInfo() . "<br>";  
    echo "date : " . $event -> getMwDateInfo() . "<br>";  
}

//$insertInfo = $managerInfo -> insertInfo($test1);
//var_dump($insertInfo);

$info = new MappingInfo ([
    "mwIdInfo" => 1,
    "mwDateInfo" => "2001-01-01",
    "mwContentInfo" => "test2",
    "mwPictureMwIdPicture" => 59,
]);

$picture = new MappingPicture([
    "mwIdPicture" => 59,
    "mwTitlePicture" => "retestUpdate",
    "mwUrlPicture" => "retestUpdate",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 0
]);

$updateInfo = $managerInfo -> updateInfo($picture, $info);
var_dump($updateInfo);

//$deleteInfo = $managerInfo -> deleteInfo(4);
