<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">

    <link rel="stylesheet" href="css/homepage.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/homepage.css">
    


    <!-- $title est défini en haut de chaque page vue, on y met le nom de la catégory ou sous catégory pour qu'il saffiche dans l'onglet du navigateur -->
    <title>MAMWE - <?= $title ?></title> 

</head>
<body>


<!-- HEADER -->



<!-- NAVBAR -->  


<!-- Affichage de la barre de navigation pour le public -->
<div class="public-nav">
    <div class="titre" ><img  src="asset/img/titre.png"></div>
            <nav>  
                <img class="logo" src="asset/img/logo1.png">
                <a href="./">Accueil</a>
            
                <!-- lien pour les category :-->
                <?php
                $allSection = $sectionManager -> getAll();
                
                foreach($allSection as $section) :  
                ?>
                <!-- VERIFIER DB pour les noms -->
                <a class="menu" href="?sectionId=<?= $section -> getMwIdSect() ?>"><?= $section -> getMwTitleSect() ;?></a>
                <?php
                endforeach;
                ?> 

                <a href="?p=contact">Contact</a>
                <a href="?p=ressources">Ressources</a>
                <a href="?p=livreDor">Livre D'or</a>
                <?php if (!empty($_SESSION)) :?>
                <button class="btn"><a href="?deconnect">deconnection</a></button>
                    <a href="?p=admin">Admin</a>
                <?php endif;?>
            </nav>
    </div>


<!-- Condition pour vérifier si l'utilisateur est connecté en tant qu'administrateur -->


