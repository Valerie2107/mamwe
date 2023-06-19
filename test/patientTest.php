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

// try{
// $test1 = new MappingPatient([
//     "mwIdPatient" => 5,
//     "mwNamePatient" => "pipou",
//     "mwSurnamePatient" => "testtest",
//     "mwBirthdatePatient" => "1986-02-02",
//     "mwMailPatient" => "test@hotmail.com",
//     "mwPhonePatient"=> 1234
// ]);
// }catch(Exception $e ){
//     $e->getMessage();
// }

// try{
// $test2 = new MappingPatient([
//     "mwNamePatient" => "lolo",
//     "mwSurnamePatient" => "lololo",
//     "mwBirthdatePatient" => "1986-02-02",
//     "mwMailPatient" => "test@hotmail.com",
//     "mwPhonePatient"=> 121212
// ]);
// }catch(Exception $e ){
//     $e->getMessage();
// }


// var_dump($test1, $test2);

// $manaPat = new ManagerPatient($db);
// var_dump($manaPat);

// $updatePat = $manaPat -> updatePatient($test1);
// insertPat =  $manaPat -> insertPatient($test1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>test Patient</h1>
    <form action="" method="POST"> 
        <input type="text" name="name" placeholder="Nom"><br>
        <input type="text" name="surname" placeholder="Prenom"><br>
        <input type="text" name="birthdate" placeholder="Date de Naissance"><br>
        <input type="text" name="mail" placeholder="Mail"><br>
        <input type="text" name="phone" placeholder="telephone"><br>
        <input type="submit">
    </form>
</body>
</html>

<?php

var_dump($_POST);

$testInsertData = new MappingPatient([

        "mwNamePatient" => $_POST['name'],
        "mwSurnamePatient" => $_POST['surname'],
        "mwBirthdatePatient" => $_POST['birthdate'],
        "mwMailPatient" => $_POST['mail'],
        "mwPhonePatient"=> $_POST['phone'],
    ]);

var_dump($testInsertData);

$manager = new ManagerPatient($db);
$insert = $manager -> insertPatient($testInsertData);

var_dump($insert);
