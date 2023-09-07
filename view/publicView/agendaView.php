<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Agenda";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<h1><?= $title ?></h1>

<?php
foreach($allAgenda as $agenda):
?>

<h2><?= $agenda-> getMwTitleAgenda() ?></h2>
<p><?= $agenda -> getMwContentAgenda() ?></p>
<p><?= date('d/m/Y', strtotime($agenda-> getMwDateAgenda())) ?></p>
<img src="<?= $agenda -> getPicture() ?>" alt="">

<?php
endforeach;
?>
</main>
<?php
// FOOTER
include_once "../view/include/footer.php";