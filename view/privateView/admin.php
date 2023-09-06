<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Administration";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
// var_dump($newMessage);
?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1>Bonjour Faouzia</h1>

<?php if (isset($response)): ?>
    <h4><?= $response ?></h4>
<?php endif; ?> 

<!-- le rest : -->


<?php if(isset($newMessage)) : ?>

        <h3>Vous avez <?= count($newMessage) ?> nouveau(x) message(s) dans le livre d'or</h3>

    <?php if(!empty($newMessage)): ?>
        <table>
            <thead>
                <tr>
                    <th>Nom et/ou présnom </th>
                    <th>E-mail</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Valider</th>
                    <th>Effacer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($newMessage as $message): ?>
                <tr>
                    <td><?= $message->getMwNameLivreDor() ?></td>
                    <td><?= $message->getMwMailLivreDor() ?></td>
                    <td><?= $message->getMwMessageLivreDor() ?></td>
                    <td><?= $message->getMwDateLivreDor() ?></td>
                    <td><button><a href="?p=admin&valider=<?= $message -> getMwIdLivreDor()?>">Valider</a></button></td>
                    <td><button><a onclick="void(0);let a=confirm('Voulez-vous vraiment supprimer \'<?= $message -> getMwNameLivreDor() ?>\' ?'); if(a){ document.location = '?p=admin&message-delete=<?= $message -> getMwIdLivreDor() ?>'; };" href="#">Effacer</a></button></td>
                </tr>
            <?php endforeach; ?> 
            </tbody>
        </table>
    <?php endif; ?>

<?php else : ?>
    <h3>Vous n'avez aucun nouveau message pour l'instant</h3>
<?php endif; ?>


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";