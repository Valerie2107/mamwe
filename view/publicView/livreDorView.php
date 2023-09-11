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
    <?php if(isset($response)):?>
        <h4><?= $response; ?></h4>
    <?php endif ?>
    <p class="intro">Laissez-moi un petit message</p>
    <div class="empty"></div>
    <section class="container">
       
        <form class="livre" name='livreDor' action='' method="POST">

            <label class="alignRight" for="nameLO">Vos nom et prénom </label><input class=border_livre type="text" name="nameLO" placeholder="Indiquez votre nom" required>

            <label class="alignRight" for="mailLO">Votre adresse e-mail </label><input class=border_livre type='email' name="mailLO" placeholder="Indiquez votre e-mail" required>

            <label class="alignRight" for="messageLO">Votre message </label><textarea class=border_livre minlength= "25" maxlength="5000" name="messageLO" placeholder="Écrivez votre message - 25 caractères minimum" required></textarea>
            
            <div class="send"><input class=border_livre id="bouton_LO" type="submit" value="Envoyer"></div>        

        </form>
       
    </section>
    <div class="empty"></div>

    <?php 
        foreach($allLivreDor as $lo): ?>
        <div class="lo">
            <p>  
                <?= $lo -> getMwMessageLivreDor(); ?>    <br>
                <?= $lo -> getMwNameLivreDor(); ?>       <br>
                <?= date('d/m/Y', strtotime($lo -> getMwDateLivreDor())); ?>
            </p>
            <br>
        </div>
    <?php  endforeach;  ?>

    <div class="empty"></div>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
