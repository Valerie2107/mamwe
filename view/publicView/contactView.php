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
    <img class="photocontact" src="asset/img/pexel.jpg">
    

    <!-- Formulaire de contact -->

    <form class="formu" method="post" action=""> 
        <label class="soustitre" for="name_contact">Nom </label><br><br>
        <input type="text" name="name_contact" required><br><br><br>

        <label class="soustitre" for="mail_contact">E-mail </label><br><br>
        <input type="email" name="mail_contact" required><br><br><br>


        <label class="soustitre" for="objet">Objet </label><br><br>
        <input type="text" id="objet_contact" required><br><br><br>


        <label class="soustitre" for="message_contact">Message </label><br><br>
        <textarea name="message_contact" rows="5" required></textarea><br><br><br>

        <button  type="button" class="submit">Envoyer</button>
    </form>
</main>
<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";
?>
