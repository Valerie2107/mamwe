<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Livre d'or";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

//var_dump($allLivreDor);

?>

<!-- HTML -->
<main>
    <h1><?= $title ?></h1>
    <div class="empty"></div>
    <p class="intro">N'hésitez pas à me laisser un petit message</p>
    <div class="empty"></div>
    <section class="container">
        <div></div>
        <form class="livre" name='livreDor' action='' method="POST">
            <div class="field"><label for="nameLO">Nom </label><input type="text" name="name" placeholder="Indiquez votre nom" required></div>
            <div class="field"><label for="mailLO">E-mail </label><input type='email' name="usermail" placeholder="Indiquez votre e-mail" required></div>
            <div class="field"><label for="messageLO">Votre message </label><textarea minlength= "25" maxlength="500" name="message" placeholder="Écrivez votre message" required></textarea></div>
            <div class="envoi"><input id="bouton" type="submit" value="Envoyer"></div>        
        </form>
        <div></div>
    </section>
    <div class="empty"></div>

    <?php  foreach($allLivreDor as $lo): ?>
        <div class="lo">
            <p>  
                <?= $lo ->getmwMessageLivreDor(); ?>    <br>
                <?= $lo ->getMwNameLivreDor(); ?>       <br>
                <?= $lo ->getmwDateLivreDor(); ?>
            </p>
            <br>
        </div>



    <?php  endforeach;  ?>

    <div class="empty"></div>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
