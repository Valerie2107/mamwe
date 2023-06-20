<?php

use model\managerClass\ManagerArticle;
use model\managerClass\ManagerPicture;
use model\mappingClass\MappingPicture;
use model\mappingClass\MappingArticle;

$mapPic = new MappingPicture([]);
$mapArt = new MappingArticle([]);

$manaPic = new ManagerPicture($db);
$manaArt = new ManagerArticle($db);

var_dump($mapArt, $mapPic, $manaArt, $manaPic);