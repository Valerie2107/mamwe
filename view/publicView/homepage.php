<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Accueil";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<h1><?= $title ?></h1>

<!-- description de la madame : -->
<div><img class="picturehome" src="<?= $allHome -> getPicture() ?>" alt=""></div>

<div class="textehome">
<?= $allHome -> getMwContentHomepage() ?></div>


<div class="section-home">
<?php  foreach($allSection as $section ): ?>
    <div class="article-home">
        <h2><?=$section -> getMwTitleSect();?></h2>
        <div class="article-pic">
       <?php $picture = $section -> getPicture();
        $pic = explode("|||", $picture);
            
        ?>
         <img src="<?= $pic[1]  ?>"alt="2" width="300px"><br>
         
        </div>
    </div>
<?php endforeach ?>
</div>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
