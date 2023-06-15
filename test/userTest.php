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
        "mwloginUser" => "text blabla",
        "mwmailUser" => "jifj@hogfkh.com",
        "mwpwdUser" => "ghjhg",
    ]);
}catch(Exception $e){
    echo $e;
}

echo "<pre>";
// var_dump($test1);
echo "</pre>";


?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CLIC</h1>
    <form method="POST">
        
        <input type="text" name="login" placeholder="login"><br>
        <input type="text" name="mail" placeholder="mail"><br>
        <input type="text" name="pwd" placeholder="pwd"><br>
        <input type= "submit" value="clic"><br>
        
    </form>
</body>
</html>

<?php

$managerUser = new ManagerUser($db);
// $user2 = $managerUser -> updateUser( 1, "lalala", "tg", "oui@mail.com");

var_dump($managerUser); 
var_dump($_POST);

if(!empty($_POST)){
    $login = $_POST['login'];
    $mail = $_POST['mail'];
    $pwd = $managerUser -> hashPwd($_POST['pwd']);

    if(isset($login, $mail, $pwd)){
        $managerUser -> updateUser(1, $login, $mail, $pwd);
    }
    if($managerUser){
        echo "on a mis l'user a jour";
    }else{
        "probleme";
    }
}else{
    echo "pas post";
}