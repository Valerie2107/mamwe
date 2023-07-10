<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Administration";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<h1><?= $title ?></h1>

    <nav>
        <a href="?p=admin"></a>
        <a href="?p=agenda">Agenda</a>
        <a href="?p=article">Article</a>
        <a href="?p=info">Info / presentation</a>
        <a href="?p=livredor">Livre d'or</a>
        <a href="?p=patient">Patient</a>
        <a href="?p=ressource">Ressources</a>
        <a href="?p=section">Section</a>
        <a href="?p=user">Admin</a> 
    </nav>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";