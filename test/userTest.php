<?php

use model\managerClass\ManagerUser;
use model\mappingClass\MappingUser;


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
    $test1 = new MappingUser([
        "mwIdUser" => 1,
        "mwloginUser" => "laurent",
        "mwmailUser" => "lolo@mail.com",
        "mwpwdUser" => "4567",
    ]);
}catch(Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1);
echo "</pre>";


// $manageUser = new ManagerUser($db);
// $update = $manageUser->updateUser($test1);

// var_dump($update);