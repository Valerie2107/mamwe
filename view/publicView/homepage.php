



<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Accueil";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<h1><?= $title ?></h1>


<div><img class="picturehome" src="<?= $allHome -> getPicture() ?>" alt=""></div>

<div class="textehome">

<?= $allHome -> getMwContentHomepage() ?></div>






<div class="section">
<?php  foreach($allSection as $section ): ?>

<h2><?=$section -> getMwTitleSect();?></h2>

<div><img class="picturehome" src="<?= $allHome -> getPicture() ?>" alt=""></div>

<?php endforeach ?></div>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
