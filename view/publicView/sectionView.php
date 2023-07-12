<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = $sectionById-> getMwTitleSect();

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<h1><?= $title ?></h1>

<?php
foreach ($articleBySection as $abs):  ?>

<div>
    <h2><?= $abs -> getmwTitleArt();?></h2>
    <p><?= $abs -> getmwContentArt();?></p>
    <div class="empty"></div>
    <p><?= $abs -> getmwDateArt(); ?></p>
    <div class="empty"></div>
</div>

<?php endforeach ?>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
