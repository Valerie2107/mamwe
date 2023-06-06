<?php 

// démarrage $_SESSION : 
session_start();

require_once "../config.php";
//require_once "../model/model.php";  // A compléter/préciser

// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails

// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' .$class . '.php';
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


// redirection vers le controlleur (surement à changer/sécuriser par après) :
include_once "../controller/frontController.php";