<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Accueil";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<h1><?= $title ?></h1>

<?= $allHome -> getMwContentHomepage() ?>
<?= $allHome -> getPicture() ?>
<img src="<?= $allHome -> getPicture() ?>" alt="">

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
