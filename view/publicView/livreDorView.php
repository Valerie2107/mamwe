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
       
        <form class="livre" name='livreDor' action='' method="POST">
            <label class="alignRight" for="nameLO">Nom </label><input type="text" name="nameLO" placeholder="Indiquez votre nom" required>
            <label class="alignRight" for="mailLO">E-mail </label><input type='email' name="mailLO" placeholder="Indiquez votre e-mail" required>
            <label class="alignRight" for="messageLO">Votre message </label><textarea minlength= "25" maxlength="500" name="messageLO" placeholder="Écrivez votre message" required></textarea>
            <div class="send"><input id="bouton" type="submit" value="Envoyer"></div>        
        </form>
       
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
