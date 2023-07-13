<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Agenda";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<!-- le rest : -->

<!-- test du delete -->

<?php foreach($allAgenda as $agenda): ?>
<h3><?= $agenda->getMwTitleAgenda(); ?></h3>
<button class="btn"><a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $agendaById->getMwTitleAgenda() ?>\' ?'); if(a){ document.location = '?p=agenda&agenda-delete=<?= $agendaById->getMwIdAgenda() ?>'; };" href="#">delete</a></button>

<?php endforeach; ?>
<?php 
if(isset($response)){
    echo $response;
};
?>

<!-- Formulaire primitif pour tester le Controller, démerdez vous maintenant : -->
<form action="" method="POST">
    <input type="text" name="agenda-insert-title" placeholder="titre" ><br>
    <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
    <textarea name="agenda-insert-content" id="mytextarea" ></textarea>
    <input type="text" name="agenda-insert-date" placeholder="date"><br>
    <input type="text" name="agenda-insert-pic-title" placeholder="titre photo"><br>
    <input type="text" name="agenda-insert-pic-url" placeholder="url photo"><br>
    <input type="text" name="agenda-insert-pic-size" placeholder="taille"><br>
    <input type="text" name="agenda-insert-pic-position" placeholder="position">
    <input type="submit" value="envoyer">
</form>


<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";