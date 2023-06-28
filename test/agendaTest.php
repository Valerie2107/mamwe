<?php

use model\mappingClass\MappingAgenda;
use model\managerClass\ManagerAgenda;


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

// test des mapping :
try{
$test1 = new MappingAgenda([
    "mwDateAgenda" => "2001-01-01",
    "mwContentAgenda" => "test",
    "mwTitleAgenda" => "test",
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

var_dump($getAll);

foreach($getAll as $event){
    echo $event -> getMwIdAgenda();
    echo $event -> getMwContentAgenda();  
    // echo "date : " . $event -> getMwDateAgenda() . "<br>";  

}

$insertA = $managerAgenda -> insertAgenda($test1);
var_dump($insertA);