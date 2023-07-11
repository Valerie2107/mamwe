<?php

use model\mappingClass\MappingAgenda;
use model\managerClass\ManagerAgenda;
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

// test des mapping :
try{
$test1 = new MappingAgenda([
    "mwDateAgenda" => "2022-07-14",
    "mwContentAgenda" => "test2",
    "mwTitleAgenda" => "test2",
    "mwPictureMwIdPicture" => null,
]);
}catch(Exception $e ){
    $e->getMessage();
}


try{
    $test2 = new MappingAgenda([
        "mwTitleSect" => "test ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgtest ret dfg zertgte",
    ]);
}catch (Exception $e){
    echo $e;
}

echo "<pre>";
var_dump($test1,$test2);
echo "</pre>";



// test des manager :
$managerAgenda = new ManagerAgenda($db);
// var_dump($managerAgenda);
$getAll = $managerAgenda -> getAll();

//var_dump($getAll);

// foreach($getAll as $event){
//     echo "id : " . $event -> getMwIdAgenda() ."<br>";
//     echo "contenu : " . $event -> getMwContentAgenda() . "<br>";  
//     echo "date : " . $event -> getMwDateAgenda() . "<br>";  
//     


// $insertA = $managerAgenda -> insertAgenda($test1);
//var_dump($insertA);

$agenda = new MappingAgenda ([
    "mwIdAgenda" => 4,
    "mwDateAgenda" => "2001-01-01",
    "mwContentAgenda" => "test2",
    "mwTitleAgenda" => "test2",
    "mwPictureMwIdPicture" => 59,
]);

$picture = new MappingPicture([
    "mwIdPicture" => 59,
    "mwTitlePicture" => "testUpdate",
    "mwUrlPicture" => "testUpdate",
    "mwSizePicture" => 1,
    "mwPositionPicture" => 0
]);

//$updateAgenda = $managerAgenda -> updateAgenda($picture, $agenda);
//var_dump($updateAgenda);

//$deleteAgenda = $managerAgenda  -> deleteAgenda(62);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
    
</head>
<body>
<h1>TinyMCE Quick Start Guide</h1>
    <form method="post">
      <textarea id="mytextarea">Hello, World!</textarea>
    </form>

</body>
</html>