<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Livre d'or";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<h1><?= $title ?></h1>

<section class="container">
    <form name='livreDor' action='' method="POST">
        <div class="champs"><label for="lastname">Nom</label><input type="text" name="lastname" placeholder="Indiquez votre nom" required></div>
        <div class="champs"><label for="firstname">Prénom</label><input type="text" name="firstname" placeholder="Indiquez votre prénom" required></div>
        <div class="champs"><label for="usermail">E-mail</label><input type='email' name="usermail" placeholder="Indiquez votre e-mail" required></div>
        <div class="champs"><label for="avis">Votre avis</label><textarea maxlength="600" name="message" placeholder="Indiquez votre avis" required></textarea></div>
        <div class="envoi"><input id="bouton" type="submit" value="Envoyer"></div>        
    </form>
</section>



<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
