<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Article";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<?php            
    if(isset($response)){
        echo $response;
    }
?>

<!-- affichage des articles dans un tableau : -->
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Contenu</th>
            <th>photo</th>
            <th>section</th>
            <th>visible</th>
            <th>update</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($allArticle as $article): 
        $visible = $article->getMwVisibleArt(); 
        $idArticle = $article->getMwIdArticle(); 
    ?>
        <tr>
            <td><?= $idArticle ?></td>
            <td><?= $article->getMwTitleArt() ?></td>
            <td><?= $article->getMwContentArt() ?></td>
            <td><?= $article->getPicture()?></td>
            <td><?= $article->getMwSectionMwIdSection()?></td>
            <td><?php if($visible === 1) : ?><a href="?p=article&visible=<?= $idArticle; ?>"><button>VISIBLE</button></a><?php else : ?><a href="?p=article&hidden=<?= $idArticle; ?>"><button>CACHE</button></a><?php endif; ?></td>
            <td>
                <button>
                    <a href="?p=article-update&article-update=<?= $article->getMwIdArticle() ?>">update</a>
                </button>
            </td>
            <td>
                <button class="btn">
                    <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $article->getMwTitleArt() ?>\' ?'); if(a){ document.location = '?p=article&article-delete=<?= $article->getMwIdArticle() ?>'; };" href="#">delete</a>
                </button>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<hr>

<h3>Ajout d'articles : </h3>
<form action="" method="POST" id="insert-article">
    <label for="mw_title_art">Title:</label><br>
    <input type="text" id="mw_title_art" name="mw_title_art"><br>

    <label for="mw_content_art">Content:</label><br>
    <textarea id="mw_content_art" name="mw_content_art" ></textarea><br>

    <label for="mw_visible_art">Visible:</label><br>
    <select id="mw_visible_art" name="mw_visible_art">
        <option value="1">Visible</option>
        <option value="0">Non-visible</option>
    </select><br>

    <label for="mw_section_mw_id_section">Section : </label><br>
    <input type="number" id="mw_section_mw_id_section" name="mw_section_mw_id_section"><br>

    <div id="add-picture-article">
        <!-- Picture fields will be added here -->
    </div><hr>

    <button type="button" id="addPicture">Add Picture</button>
    <input type="submit" value="Submit">
</form>


<!-- FOOTER -->

<script src="js/addPictureForm.js"></script>

<?php

include_once "../view/include/footer.php";