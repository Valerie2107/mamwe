<?php

use model\mappingClass\MappingArticle;


// require de la config:
require_once "../config.php";


// require_once "../vendor/autoload.php"; -> Appel des dépendances qui gèrent les mails


// Autoload des classes (/model/) :
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' . $class . '.php';
});



$test1 = new MappingArticle([
    "mwIdArticle" => 1,
    "mwTitleArt" => "test",
    "mwContentArt" => "test",
    "mwVisibleArt" => "1",
    "mwSectionMwIdSection" => 0
]);

try{
    $test2 = new MappingArticle([
        "mwTitleArt" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertg",
    ]);
}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";