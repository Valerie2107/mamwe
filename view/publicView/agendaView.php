<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Agenda";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<figure class="circle"></figure>
    <h1><?= $title ?></h1>

    <h2>Evenement à venir : </h2>
    <?php
    foreach($futurAgenda as $futur):
    ?>

    <h2><?= $futur-> getMwTitleAgenda() ?></h2>
    <p><?= $futur -> getMwContentAgenda() ?></p>
    <p><?= date('d/m/Y', strtotime($futur-> getMwDateAgenda())) ?></p>
    <img src="<?= $futur -> getPicture() ?>" alt="" width="300px">
        <hr>
    <?php
    endforeach;
    ?>


    <h2>Evenements passés : </h2>
    <?php
    foreach($pastAgenda as $past):
    ?>

    <h2><?= $past-> getMwTitleAgenda() ?></h2>
    <p><?= $past -> getMwContentAgenda() ?></p>
    <p><?= date('d/m/Y', strtotime($past-> getMwDateAgenda())) ?></p>
    <img src="<?= $past -> getPicture() ?>" alt="" width="300px">
        <hr>
    <?php
    endforeach;
    ?>

</main>
<?php
// FOOTER
include_once "../view/include/footer.php";