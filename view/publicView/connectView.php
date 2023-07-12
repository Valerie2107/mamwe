<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Connection";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<h1><?= $title ?></h1>

<?php if(isset($erreur)){
    echo $erreur;
}
?>

<form method="POST">
    <input type="text" name="login" >
    <input type="password" name="pwd">
    <input type="submit" value="Connexion">
</form>

</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
