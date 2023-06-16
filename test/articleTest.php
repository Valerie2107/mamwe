<?php

use model\mappingClass\MappingArticle;
use model\managerClass\ManagerArticle;


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

$managerArt = new ManagerArticle($db);
$articles = $managerArt->getAllArticlesWithPictures($db);

foreach($articles as $item) {
    echo "article id : " . $item->getMwIdArticle() . "<br>";
    echo $item->getMwTitleArt() . "<br>";
    echo $item->getMwContentArt() . "<br>";

if(is_null($item->getPicture())){

    echo "yapa photos <br>";

}else{
    $picture = $item -> getPicture();
    $pic = explode("|||", $picture);
    echo "photo id : " . $pic[0] . "<br>";
    ?>
    <img src="<?= $pic[1] ?>" width="300px"><br>
    <hr>
    <?php
}
}
}catch(Exception $e){

    //die($e->getMessage());
    echo $e->getMessage();
    echo "<br>";
}
?>