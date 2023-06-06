<?php
/* Je pensais mettre juste un controlleur
1- y'a pas une admin trop complexe
2- comme ça la madame peut naviguer son site en étant connectée sans que ça nous file des mots de tête -->
*/
use model\model;

// redirection vers la homepage par défaut / à compléter par après:
$test = new model(["test" => "test"]);
require_once "../view/publicView/homepage.php";