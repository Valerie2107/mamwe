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

<!-- Formulaire primitif pour tester le Controller, démerdez vous maintenant : -->
<form action="" method="POST">
    <input type="text" name="titleAgenda" placeholder="titre" ><br>
    <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
    <textarea name="contentAgenda" id="mytextarea" ></textarea>
    <input type="text" name="dateAgenda" placeholder="date"><br>
    <input type="text" name="titlePic" placeholder="titre photo"><br>
    <input type="text" name="urlPic" placeholder="url photo"><br>
    <input type="text" name="sizePic" placeholder="taille"><br>
    <input type="text" name="positionPic" placeholder="position">
    <input type="submit" value="envoyer">
</form>

<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";