<?php
// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Contact";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";
var_dump($mailSent);
?>

<!-- HTML -->
<main>
    <h1><?= $title ?></h1>

    <!-- Formulaire de contact -->
    <form class="formu" method="post" action=""> 
        <label for="name_contact">Nom :</label><br>
        <input type="text" name="name_contact" required><br><br>

        <label for="mail_contact">Adresse e-mail :</label><br>
        <input type="email" name="mail_contact" required><br><br>

        <label for="message_contact">Message :</label><br>
        <textarea name="message_contact" rows="5" required></textarea><br><br>

        <input type="submit" value="Envoyer">
    </form>
</main>
<!-- FOOTER -->
<?php
include_once "../view/include/footer.php";
?>
