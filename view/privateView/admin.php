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

<div class="container-crud">
    <h3>Bonjour Faouzia</h3>
    
    <div class="response">
        <?php if (isset($response)): ?>
            <p><?= $response ?></p>
        <?php endif; ?> 
    </div>

    <?php if(isset($newMessage)) : ?>
        <h4>Vous avez <?= count($newMessage) ?> nouveau(x) message(s) dans le livre d'or</h4>
        <?php if(!empty($newMessage)): ?>
            <table class="crud-table">
                <thead>
                    <tr>
                        <th>Nom et/ou prénom </th>
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
        <h4>Vous n'avez aucun nouveau message pour l'instant</h4>
    <?php endif; ?>
</div>


<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";