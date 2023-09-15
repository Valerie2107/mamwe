<?php
// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Contact";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<figure class="circle20"></figure>
<figure class="circle21"></figure>

    <h1><?= $title ?></h1>
    <img class="photocontact" src="asset/img/logo2.png">
    

    <!-- Formulaire de contact -->

    <form class="formu" method="post" action=""> 
        <label class="soustitre" for="name_contact"> </label><br><br>
        <input  type="text" placeholder="Nom" name="name_contact" required>

        <label class="soustitre" for="mail_contact"> </label><br><br>
        <input type="email" placeholder="E-mail" name="mail_contact" required>

        <label class="soustitre" for="objet"> </label><br><br>
        <input type="text" placeholder="Objet" id="objet_contact" required>

        <label class="soustitre" for="message_contact"> </label><br><br>
        <input name="message_contact" placeholder="Message" rows="5" required></input><br>

        <br><br><br><button  type="button" class="submit">Envoyer</button>
    </form>
    
</main>
<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";
?>
