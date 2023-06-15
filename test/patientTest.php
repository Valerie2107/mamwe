<?php

use model\managerClass\ManagerPatient;
use model\mappingClass\MappingPatient;


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
echo "<hr></pre>";

$managerPatient = new ManagerPatient($db);

$getAll = $managerPatient -> getAll();
var_dump($getAll);

echo "<hr>";

$patient1 = $managerPatient -> getOneById(1);
var_dump($patient1);

echo "<hr>";

$insertPatient = $managerPatient -> insertPatient("jean", "deaux", "1983-10-20", "jean@mail.com", 48811223);
var_dump($insertPatient);

// $delete = $managerPatient -> deletePatient(2);
// var_dump($delete);

// $update = $managerPatient -> updatePatient("momo", "lolo", "1983-06-10", "momo@mail.com", 123456, 1);
// var_dump($update);