<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = $sectionById-> getMwTitleSect();

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->
<main>
<h1><?= $title ?></h1>


</main>
<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
