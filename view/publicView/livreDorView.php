<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Livre d'or";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

//var_dump($allLivreDor);

?>

<!-- HTML -->
<h1><?= $title ?></h1>

<section class="container">
    <form name='livreDor' action='' method="POST">
        <div class="champs"><label for="nameLO">Nom</label><input type="text" name="lastname" placeholder="Indiquez votre nom" required></div>
        <div class="champs"><label for="mailLO">E-mail</label><input type='email' name="usermail" placeholder="Indiquez votre e-mail" required></div>
        <div class="champs"><label for="messageLO">Votre message</label><textarea maxlength="600" name="message" placeholder="Écrivez votre message" required></textarea></div>
        <div class="envoi"><input id="bouton" type="submit" value="Envoyer"></div>        
    </form>
</section>

<div class="empty"></div>

<?php  foreach($allLivreDor as $lo): ?>
    <div>
        <p>  
            <?= $lo ->getMwNameLivreDor(); ?>   <br>
            <?= $lo ->getmwMessageLivreDor(); ?>   <br>
            <?= $lo ->getmwDateLivreDor(); ?>
        </p>
        <br>
    </div>


<?php  endforeach;  ?>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
