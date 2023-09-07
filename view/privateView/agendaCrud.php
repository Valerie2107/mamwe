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

<?php
if(isset($response)){
    echo "<h4>$response</h4>";
}
?>

<!-- le rest : -->

<table>
    <thead>
        <tr>Titre</tr>
        <tr>Contenu</tr>
        <tr>Date</tr>
        <tr>Update</tr>
        <tr>Delete</tr>
    </thead>
    <tbody>

        <?php foreach($allAgenda as $agenda): ?>
            <tr>
                <td><?= $agenda->getMwTitleAgenda(); ?></td>
                <td><?= $agenda->getMwContentAgenda(); ?></td>
                <td><?= $agenda->getMwDateAgenda(); ?></td>
                <td>
                    <button>
                        <a href="?p=agenda-update&agenda-update=<?= $agenda-> getMwIdAgenda() ?>">Update</a>
                    </button>
                </td>
                <td>
                    <button class="btn">
                        <a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $agenda->getMwTitleAgenda() ?>\' ?'); if(a){ document.location = '?p=agendaCrud&agenda-delete=<?= $agenda->getMwIdAgenda() ?>'; };" href="#">delete</a>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<!-- Formulaire primitif pour tester le Controller, démerdez vous maintenant : -->
<form action="" method="POST">
    <label for="agenda-insert-title">Titre : </label>
    <input type="text" name="agenda-insert-title"><br>
    <!-- y'a le #mytextarea pour relier à l'éditeur de text -->
    <label for="agenda-insert-content">Description de l'évenement : </label>
    <textarea name="agenda-insert-content" id="mytextarea"></textarea>

    <label for="agenda-insert-date">Date :</label>
    <input type="date" name="agenda-insert-date" ><br>

    <h4>Photo : </h4>
    <label for="agenda-insert-pic-title">Titre de la photo : </label>
    <input type="text" name="agenda-insert-pic-title"><br>

    <label for="agenda-insert-pic-url">Url de la photo : </label>
    <input type="text" name="agenda-insert-pic-url"><br>

    <label for="agenda-insert-pic-size">Taille :</label>
    <input type="text" name="agenda-insert-pic-size"><br>

    <label for="agenda-insert-pic-position">Position : </label>
    <input type="text" name="agenda-insert-pic-position">

    <input type="submit" value="envoyer">
</form>


<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";