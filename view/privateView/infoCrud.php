<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Info";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<!-- nav bar de l'admin -->
<?php include_once '../view/include/privateNav.php'; ?>

<!-- titre -->
<h1><?= $title ?></h1>

<!-- le rest : -->

<?php var_dump($allInfo); ?>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";