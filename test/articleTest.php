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
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$managerArt = new ManagerArticle($db);

$articles = $managerArt->getAllArticlesWithPictures($db);

foreach($articles as $article) {
echo "article id : " . $article->getMwIdArticle() . "<br>";
echo $article->getMwTitleArt() . "<br>";
echo $article->getMwContentArt() . "<br>";

if(empty($article->pictures)){
    echo "yapa photos";
}else{
foreach($article->pictures as $picture) {
echo "pic id : " . $picture->getMwIdPicture();
?>
<br>
<img src='<?= $picture->getMwUrlPicture()?>' width='200px'>
<?php
echo "<br>";
}
}
}
}
catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

/*
    foreach ($articles as $article) {
        echo 'ID: ' . $article['id'] . '<br>';
        echo 'Title: ' . $article['title'] . '<br>';
        echo 'Content: ' . $article['content'] . '<br>';
        echo 'Date: ' . $article['date'] . '<br>';
        echo 'Visible: ' . $article['visible'] . '<br>';
        echo 'Section: ' . $article['section'] . '<br>';
        echo 'Pictures:<br>';
        foreach ($article['pictures'] as $picture) {
            echo '<img src="' . $picture['url'] . '" alt="Picture ID: ' . $picture['id'] . '" width="200" height="200"><br>';
            var_dump($picture);
        }
        echo '<hr>';  // ligne de séparation pour chaque article
    }
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}
*/
?>
</body>
</html>