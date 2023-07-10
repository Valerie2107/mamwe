<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>



<?php

// on peut mettre les titres des rubriques dans la variables $title qu'on utilise dans la balise <title>
$title = "Accueil";

// HEAD + HEADER + NAVBAR
include_once "../view/include/header.php";

?>

<!-- HTML -->

<h1><?= $title ?></h1>


<div><img class="picturehome" src="<?= $allHome -> getPicture() ?>" alt=""></div>

<div class="textehome">
<?= $allHome -> getMwContentHomepage() ?></div>

<!-- FOOTER -->
<?php

include_once "../view/include/footer.php";
