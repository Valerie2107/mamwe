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
}


try{
    $test2 = new MappingInfo([
        "mwIdInfo" => 1,
        "mwContentInfo" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgte",
        "mwDateInfo" => "2022-05-17",
        "mwPictureMwIdPicture" => 54,
    ]);
}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";



// test des manager :
$managerInfo = new ManagerInfo($db);
var_dump($managerInfo);
$getAll = $managerInfo -> getAll();

//var_dump($getAll);

foreach($getAll as $event){
    echo "id : " . $event -> getMwIdInfo() ."<br>";
    echo "contenu : " . $event -> getMwContentInfo() . "<br>";  
    echo "date : " . $event -> getMwDateInfo() . "<br>";  
}



$info = new MappingInfo ([
    "mwDateInfo" => "2001-01-01",
    "mwContentInfo" => "yipikai",
]);


$picture = new MappingPicture([

    "mwTitlePicture" => "yipikai",
    "mwUrlPicture" => "https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 0,
    "mwArticleMwIdArticle"=>7
]);

var_dump($picture,$info);

//$insertInfo = $managerInfo -> insertInfo($picture, $info);
//var_dump($insertInfo);


$updateInfo = $managerInfo -> updateInfo($picture, $info);
var_dump($updateInfo);

//$deleteInfo = $managerInfo -> deleteInfo(27);
