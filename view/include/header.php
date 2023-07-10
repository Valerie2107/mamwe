<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- $title est défini en haut de chaque page vue, on y met le nom de la catégory ou sous catégory pour qu'il saffiche dans l'onglet du navigateur -->
    <title>MAMWE - <?= $title ?></title> 

</head>
<body>


<!-- HEADER -->



<!-- NAVBAR -->  


<!-- Affichage de la barre de navigation pour le public -->
<nav>

    
    <div class="public-nav">
    <div class="titre" ><img  src="asset/img/titre.png"></div>
    <div ><img class="logo" src="asset/img/logo1.png"></div>

    
   
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
       
</div>


<!-- Condition pour vérifier si l'utilisateur est connecté en tant qu'administrateur -->
<?php if (!empty($_SESSION)) :?>
    
        <div>
            <!-- Affichage de la barre de navigation pour l'administrateur -->
            <a href="?p=admin">Admin</a>
            <a href="?p=formPwd">Changer le mot de passe</a>
            <a href="?p=addRessource">Ajouter une ressource</a>
            <a href="?p=addArticle">Ajouter un article</a>
            <button class="btn"><a href="?deconnect">deconnection</a></button>
        </div>
    </nav>
<?php 
    endif;
?>

