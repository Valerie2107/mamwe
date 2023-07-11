<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Section";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<!-- le rest : -->



<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";