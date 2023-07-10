<?php

use model\mappingClass\MappingArticle;
use model\managerClass\ManagerArticle;
use model\mappingClass\MappingPicture;
use model\managerClass\ManagerPicture;

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

    $section_id = 1;  // à remplacer plus tard part un $_GET['section_id'] ! sécurité à faire
    $managerArt = new ManagerArticle($db);
    $articles = $managerArt->getAllArticlesWithPictures($db, $section_id);


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

    <html>
    <head>
        <title>Insert Article</title>
    </head>
    <body>
    <h1>Insert Article</h1>
    <form action="" method="post" id="myForm">
        <label for="mw_title_art">Title:</label><br>
        <input type="text" id="mw_title_art" name="mw_title_art"><br>

        <label for="mw_content_art">Content:</label><br>
        <textarea id="mw_content_art" name="mw_content_art" rows="4" cols="50"></textarea><br>

        <label for="mw_visible_art">Visible:</label><br>
        <select id="mw_visible_art" name="mw_visible_art">
            <option value="1">Visible</option>
            <option value="0">Not Visible</option>
        </select><br>

        <label for="mw_section_mw_id_section">Section ID:</label><br>
        <input type="number" id="mw_section_mw_id_section" name="mw_section_mw_id_section"><br>

        <div id="pictures">
            <!-- Picture fields will be added here -->
        </div>

        <button type="button" id="addPicture">Add Picture</button>

        <input type="submit" value="Submit">
    </form>

    <script>
        document.getElementById('addPicture').addEventListener('click', function() {
            var picturesDiv = document.getElementById('pictures');
            var pictureCount = picturesDiv.childElementCount / 4; // 4 fields per picture

            ['Title', 'URL', 'Size', 'Position'].forEach(function(field) {
                var label = document.createElement('label');
                label.textContent = 'Picture ' + (pictureCount + 1) + ' ' + field + ':';
                picturesDiv.appendChild(label);
                picturesDiv.appendChild(document.createElement('br'));

                var input = document.createElement('input');
                input.type = field === 'Size' || field === 'Position' ? 'number' : 'text';
                input.id = 'mw_picture_' + pictureCount + '_' + field.toLowerCase();
                input.name = 'mw_picture[' + pictureCount + '][' + field.toLowerCase() + ']';
                picturesDiv.appendChild(input);
                picturesDiv.appendChild(document.createElement('br'));
            });
        });
    </script>
    <?php
    //var_dump($_POST);
    echo "<pre>";
    //var_dump($articleInsert);
    echo "</pre>";
    ?>
    </body>
    </html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new PDO(DB_TYPE.':host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME.';charset='.DB_CHARSET,DB_LOGIN,DB_PWD);
    $manager = new \model\managerClass\ManagerArticle($db);
    $article = new MappingArticle([
        "mwTitleArt" => $_POST['mw_title_art'],
        "mwContentArt" => $_POST['mw_content_art'],
        "mwVisibleArt" => $_POST['mw_visible_art'],
        "mwSectionMwIdSection" => $_POST['mw_section_mw_id_section'],
    ]);

    $pictures = [];
    if (isset($_POST['mw_picture'])) {
        foreach ($_POST['mw_picture'] as $pictureData) {
            if (
                isset($pictureData['title'], $pictureData['url'], $pictureData['size'], $pictureData['position']) &&
                $pictureData['title'] !== '' &&
                $pictureData['url'] !== ''
            ) {
                $picture = new MappingPicture([
                    'mwTitlePicture' => $pictureData['title'],
                    'mwUrlPicture' => $pictureData['url'],
                    'mwSizePicture' => $pictureData['size'],
                    'mwPositionPicture' => $pictureData['position'],
                ]);
                $pictures[] = $picture;
            }
        }
    }

    $insertPic = new MappingPicture([
            "mwIdPicture" => "1",
        "mwTitlePicture" => "test",
        "mwUrlPicture" => "test",
        "mwSizePicture" => "1",
        "mwPositionPicture" => "1",
    ]);

    $insertedArticle = new MappingArticle([
        "mwIdArticle" => "1",
        "mwTitleArt" => "test",
        "mwContentArt" => "test",
        "mwVisibleArt" => "1",
        "mwSectionMwIdSection" => "1",
    ]);

    $articleTest = new ManagerArticle($db);
    $pictureTest = new ManagerPicture($db);

    $insertedArticle = $articleTest->insertArticle($insertedArticle, $insertPic);
    $insertedArticle2 = $articleTest->insertArticle($insertedArticle);
    //$articleUpdate = $articleTest -> updateArticleWithPic($insertPic, $insertedArticle);
    // $deleteSection = $sectionTest -> deleteSection(6);

}


var_dump($insertedArticle);
var_dump($insertedArticle2);
//var_dump($articleUpdate);

