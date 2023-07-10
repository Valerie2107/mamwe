<?php

require_once '../config.php';

use model\managerClass\ManagerLivreDor;
use model\mappingClass\MappingLivreDor;


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

$livreDor1 = new MappingLivreDor([
    'mwNameLivreDor' => "jonjon",
    'mwMailLivreDor' => "mail@jon.com",
    'mwMessageLivreDor' => "salut test mapping 1 f sdf qsdfsq fsf sdqdf qsf ddqsf qsd fqsdq fd ",
    'mwDateLivreDor' => "2001-01-01",
    'mwVisibleLivreDor' => 1,

]);

$livreDor2 = new MappingLivreDor([
    'mwIdLivreDor' => 3,
    'mwNameLivreDor' => "update test",
    'mwMailLivreDor' => "mail@jon.com",
    'mwMessageLivreDor' => "salut test update oui f sdf qsdfsq fsf sdqdf qsf ddqsf qsd fqsdq fd ",
    'mwDateLivreDor' => "2001-01-01",
    'mwVisibleLivreDor' => 1,
]);


var_dump($livreDor1);

$managerLO = new ManagerLivreDor($db);
var_dump($managerLO);

$getAll = $managerLO -> getAll();


$getAllVisible = $managerLO->getAllVisible();
var_dump($getAll, $getAllVisible);

$getById = $managerLO->getOneById(1);
// var_dump($getById);



// insert fonctionne :
// $insert = $managerLO->insertLivreDor($livreDor1);
// var_dump($insert);

// $update = $managerLO -> updateLivreDor($livreDor2);
// var_dump($update);

// $delete = $managerLO -> deleteLivreDor(6);
// var_dump($delete);