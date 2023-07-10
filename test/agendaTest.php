<?php

use model\mappingClass\MappingAgenda;
use model\managerClass\ManagerAgenda;
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
try{
$test1 = new MappingAgenda([
    "mwDateAgenda" => "2022-07-14",
    "mwContentAgenda" => "test2",
    "mwTitleAgenda" => "test2",
    "mwPictureMwIdPicture" => null,
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



// test des manager :
$managerAgenda = new ManagerAgenda($db);
// var_dump($managerAgenda);
$getAll = $managerAgenda -> getAll();

//var_dump($getAll);

// foreach($getAll as $event){
//     echo "id : " . $event -> getMwIdAgenda() ."<br>";
//     echo "contenu : " . $event -> getMwContentAgenda() . "<br>";  
//     echo "date : " . $event -> getMwDateAgenda() . "<br>";  
//     


// $insertA = $managerAgenda -> insertAgenda($test1);
//var_dump($insertA);

$agenda = new MappingAgenda ([
    "mwIdAgenda" => 4,
    "mwDateAgenda" => "2001-01-01",
    "mwContentAgenda" => "test2",
    "mwTitleAgenda" => "test2",
    "mwPictureMwIdPicture" => 59,
]);

$picture = new MappingPicture([
    "mwIdPicture" => 59,
    "mwTitlePicture" => "testUpdate",
    "mwUrlPicture" => "testUpdate",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 0
]);

//$updateAgenda = $managerAgenda -> updateAgenda($picture, $agenda);
//var_dump($updateAgenda);

//$deleteAgenda = $managerAgenda  -> deleteAgenda(62);