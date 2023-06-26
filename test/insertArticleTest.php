<?php

require_once '../config.php';

use model\managerClass\ManagerArticle;
use model\managerClass\ManagerPicture;
use model\mappingClass\MappingArticle;
use model\mappingClass\MappingPicture;

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

$mapPic = new MappingPicture([]);

$mapArt = new MappingArticle([]);

$manaPic = new ManagerPicture($db);
$manaArt = new ManagerArticle($db);

var_dump($mapArt, $mapPic, $manaArt, $manaPic);

