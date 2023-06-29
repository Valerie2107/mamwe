<?php

use model\managerClass\ManagerHomepage;
use model\mappingClass\MappingHomepage;
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

try {
    $test1 = new MappingHomepage([
        "mwIdHomepage" => 1,
        "mwContentHomepage" => "text blabla",
        "mwDateHomepage" => "20/10/1983",
        "mwPictureMwIdPicture" => 1,
    ]);
}catch(Exception $e){
    echo $e;
}

// var_dump($test1);

$managerHome = new ManagerHomepage($db);

$picture = new MappingPicture([
    "mwIdPicture" => 92,
    "mwTitlePicture" => "update homepage",
    "mwUrlPicture" => "https://cloudfront-eu-central-1.images.arcpublishing.com/ipmgroup/K5T3RAWELNA5NENFIGJAF7I5OQ.jpg",
    "mwSizePicture" => 0,
    "mwPositionPicture" => 0,
]);

$testUpdate = new MappingHomepage([
    "mwIdHomepage" => 1,
    "mwContentHomepage" => "test update homepage",
    "mwDateHomepage" => "2001-01-01",
    "mwPictureMwIdPicture" => 92,
]);


// $update = $managerHome -> updateHomepage($picture, $testUpdate);

// var_dump($update);


$getAll = $managerHome -> getAll();

echo $getAll->getMwContentHomepage() . "<br>";
echo "date : " . $getAll->getMwDateHomepage() . "<br>";

?>
<img src="<?= $getAll->getPicture() ?>" alt="">
