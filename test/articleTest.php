<?php

use model\mappingClass\MappingArticle;
use model\managerClass\ManagerArticle;
use model\mappingClass\MappingPicture;
use model\managerClass\ManagerPicture;

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

$articleManager = new ManagerArticle($db);

$all = $articleManager->getAll();
$one = $articleManager->getOneById(24);
$one = $articleManager->deleteArticle(24);

var_dump($one);