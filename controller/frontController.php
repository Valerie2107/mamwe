<?php

########### APPELLE DES DEPENDANCES ##########
// appelle des mapping :
use model\mappingClass\MappingAgenda;
use model\mappingClass\MappingArticle;
use model\mappingClass\MappingCategoryRessource;
use model\mappingClass\MappingHomepage;
use model\mappingClass\MappingInfo;
use model\mappingClass\MappingLivreDor;
use model\mappingClass\MappingPatient;
use model\mappingClass\MappingPicture;
use model\mappingClass\MappingRessource;
use model\mappingClass\MappingSection;
use model\mappingClass\MappingSubCategoryRessource;
use model\mappingClass\MappingUser;

// appelle des manager :
use model\managerClass\ManagerAgenda;
use model\managerClass\ManagerArticle;
use model\managerClass\ManagerHomepage;
use model\managerClass\ManagerInfo;
use model\managerClass\ManagerLivreDor;
use model\managerClass\ManagerPatient;
use model\managerClass\ManagerPicture;
use model\managerClass\ManagerRessource;
use model\managerClass\ManagerSection;
use model\managerClass\ManagerUser;
use DateTime as Date;

### VARIABLE DATE ############################
$currentDate = new Date();
$currentDate = $currentDate->format("Y-d-m");
#############################################

############# INSTANCIATION DE MANAGERS ##################

### RECUP LES SECTIONS POUR LA NAVBAR : 
$sectionManager = new ManagerSection($db); 
$allSection = $sectionManager -> getAll();
#####


### HOMEPAGE : on récup les variables pour l'accueil ici parce qu'on va en avoir besoin en plusieur endroit :
$homeManager = new ManagerHomepage($db);
$allHome = $homeManager -> getAll();
##### 


### instanciation de ManagerUser pour se connecter ou pas :
$userManager = new ManagerUser($db);

### instanciation du manager d'articles :
$articleManager =  new ManagerArticle($db);

### Livre d'or
$livreManager = new ManagerLivreDor($db);
$allLivreDor = $livreManager->getAll();

### info :
$infoManager = new ManagerInfo($db);
$allInfo = $infoManager->getAll();

### ressources : 
$ressourceManager = new ManagerRessource($db);
$allRessource = $ressourceManager->getAll();
$allCategory = $ressourceManager->getAllCateg();
$allSubCateg = $ressourceManager->getAllSubCateg();

### patient :
$patientManager = new ManagerPatient($db);

### agenda :
$agendaManager = new ManagerAgenda($db);
$allAgenda = $agendaManager->getAll();

### picture 
$pictureManager = new ManagerPicture($db);

##########################################################


#############CONNECION / DECONNEXION #####################
// deconnection de l'admin
if(isset($_GET['deconnect'])){
    $userManager->disconnect();         
    header("Location: ./");
    exit();
}
    
// connection à l'admin
if(isset($_POST['login'],$_POST['pwd'])){
    $userMapping = new MappingUser([
        "mwLoginUser" => $_POST['login'],
        "mwPwdUser" => $_POST['pwd']
    ]);
    $connectUser = $userManager->connect($userMapping);

    if($connectUser){
        include_once '../view/privateView/admin.php';
    }else{
        $erreur = "Nom d'utilisateur ou mot de passe incorrect ! "; 
    }
}  
#######################################################################



####################### CONTROLLER FRONTAL #############################


    // ets-ce qu'on est connecté :
    else if(isset($_SESSION['idSession']) && $_SESSION['idSession']==session_id()){

        ### LES INSERTS :
        // Agenda :
        if(isset($_POST['agenda-insert-date'],$_POST['agenda-insert-content'], $_POST['agenda-insert-title'], $_POST['agenda-insert-pic-title'], $_POST['agenda-insert-pic-url'], $_POST['agenda-insert-pic-size'], $_POST['agenda-insert-pic-position'])){
            $agendaInsertMap = new MappingAgenda([
                "mwDateAgenda" => $_POST['agenda-insert-date'],
                "mwContentAgenda" => $_POST['agenda-insert-content'],
                "mwTitleAgenda" =>  $_POST['agenda-insert-title'],
            ]); 

            $agendaInsertPicMap = new MappingPicture([
                "mwTitlePicture" => $_POST['agenda-insert-pic-title'],
                "mwUrlPicture" => $_POST['agenda-insert-pic-url'],
                "mwSizePicture" => $_POST['agenda-insert-pic-size'],
                "mwPositionPicture" => $_POST['agenda-insert-pic-position']
            ]);

            $insertAgenda = $agendaManager -> insertAgendaWithPict($agendaInsertPicMap, $agendaInsertMap);
            if($insertAgenda){
                $response = "Evenement enregistrer !";
            }else{
                $response = "Un problème est survenu, réssayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=agendaCrud';
                    }, 3000);
                </script>
            <?php

        }  

        // Article : 
        if(isset($_POST['mw_title_art'], $_POST['mw_content_art'], $_POST['mw_visible_art'], $_POST['mw_section_mw_id_section'])){        
                $articleInsertMap = new MappingArticle([
                    "mwTitleArt" => $_POST['mw_title_art'],
                    "mwContentArt" => $_POST['mw_content_art'],
                    "mwVisibleArt" => $_POST['mw_visible_art'],
                    "mwSectionMwIdSection" => $_POST['mw_section_mw_id_section'],
                ]);
            
                $pictureInsertArray = [];
                if (isset($_POST['mw_picture'])) {
                    foreach ($_POST['mw_picture'] as $pictureData) {
                        if (
                            isset($pictureData['title'], $pictureData['url'], $pictureData['size'], $pictureData['position']) &&
                            $pictureData['title'] !== '' &&
                            $pictureData['url'] !== ''
                        ) {
                            $picture = new MappingPicture([
                                'mwTitlePicture' => $pictureData['title'],
                                'mwUrlPicture' => $pictureData['url'],
                                'mwSizePicture' => $pictureData['size'],
                                'mwPositionPicture' => $pictureData['position'],
                            ]);
                            $pictureInsertArray[] = $picture;
                        }
                    }
                }
                $insertArticle = $articleManager -> insertArticle($articleInsertMap, $pictureInsertArray);
                if($insertArticle){
                    $response = "article enregistrer !";
                }else{
                    $response = "Un problème est survenu, réssayez !";
                }
                ?>
                    <script>
                        window.setTimeout(function() {
                            window.location = './?p=article';
                        }, 3000);
                    </script>
                <?php

        }  

        // insert info:  
        if(isset($_POST['info-insert-content'], $_POST['info-insert-pic-title'], $_POST['info-insert-pic-url'], $_POST['info-insert-pic-size'], $_POST['info-insert-pic-position'])){

            $infoInsertPicMap = new MappingPicture([
                'mwTitlePicture' => $_POST['info-insert-pic-title'],
                'mwUrlPicture' => $_POST['info-insert-pic-url'],
                'mwSizePicture' => $_POST['info-insert-pic-size'],
                'mwPositionPicture' => $_POST['info-insert-pic-position'],
            ]);

            $infoInsertMap = new MappingInfo([
                "mwContentInfo"=> $_POST['info-insert-content'],
                "mwDateInfo" => $currentDate,
            ]);

            $insertInfo = $infoManager -> insertInfo($infoInsertPicMap, $infoInsertMap);
            if($insertInfo){
                $response = "Nouvelle information enregistrer !";
            }else{
                $response = "Un problème est survenu, réssayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=info';
                    }, 3000);
                </script>
            <?php
        }  
        

        // insert ressource :
        if(isset($_POST['ressource-insert-title'], $_POST['ressource-insert-content'], )){
            if(isset($_POST['ressource-insert-pic-title'])){
                $pictureMap= new MappingPicture([]);
            }else{
                $pictureMap = null;
            }

            if(ctype_digit($_POST['ressource-insert-categ'])){
                $categMap = new MappingCategoryRessource([]);
            }else{
                $categMap = null;
            }

            if(ctype_digit($_POST['ressource-insert-subcateg'])){
                $subCategMap = new MappingSubCategoryRessource([]);
            }else{
                $subCategMap = null;
            }

            $ressourceInsertMap = new MappingRessource([]);

            $insertRessource = $ressourceManager->insertRessource($pictureMap, $categMap, $subCategMap, $ressourceInsertMap);
            if($insertRessource){
                $response = "Nouvelle ressource enregistrer !";
            }else{
                $response = "Un problème est survenu, réssayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=ressourceCrud';
                    }, 3000);
                </script>
            <?php
        } 

        // insert section :
        if(isset($_POST['section-insert-title'], $_POST['section-insert-content'], $_POST['section-insert-visible'], $_POST['section-insert-pic-title'], $_POST['section-insert-pic-url'], $_POST['section-insert-pic-size'], $_POST['section-insert-pic-position'])){

            $sectionInsertPicMap = new MappingPicture([
                'mwTitlePicture' => $_POST['section-insert-pic-title'],
                'mwUrlPicture' => $_POST['section-insert-pic-url'],
                'mwSizePicture' => $_POST['section-insert-pic-size'],
                'mwPositionPicture' => $_POST['section-insert-pic-position'],
            ]);

            $sectionInsertMap = new MappingSection([
                'mwTitleSect' => $_POST['section-insert-title'],
                'mwContentSect' => $_POST['section-insert-content'],
                'mwVisible' => $_POST['section-insert-visible'],
            ]);

            $insertSection = $sectionManager -> insertSectionWithPic($sectionInsertPicMap, $sectionInsertMap);
            if($insertSection){
                $response = "Nouvelle section enregistrer !";
            }else{
                $response = "Un problème est survenu, réssayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=section';
                    }, 3000);
                </script>
            <?php
        }  
             
        
        ### LES DELETES :
        // agenda :
        if(isset($_GET['agenda-delete']) && ctype_digit($_GET['agenda-delete'])){
            $agendaId = (int) $_GET['agenda-delete']; 
            $agendaById = $agendaManager-> getOneById($agendaId);
            try {
                $agendaDelete = $agendaManager->deleteAgenda($agendaId);
                $pictureDelete = $pictureManager->deletePicture($agendaById->getMwPictureMwIdPicture());
            }catch(Exception $e){
                $e -> getMessage();
            }

            if($agendaDelete){
                $response = "Evenement : " . $agendaById -> getMwTitleAgenda() . " est effacé !";              
            }else{
                $response = "Un problème est survenu, réessayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=agendaCrud';
                    }, 3000);
                </script>
            <?php
        }


        // article : 
        if(isset($_GET['article-delete']) && ctype_digit($_GET['article-delete'])){
            $articleId = (int) $_GET['article-delete']; 
            $articleById = $articleManager-> getOneById($articleId);
            try {
                $articleDelete = $articleManager->deletearticle($articleId);
                $pictureDelete = $pictureManager->deletePicture($articleId);
            }catch(Exception $e){
                $e -> getMessage();
            }

            if($articleDelete){
                $response = "Article : " . $articleById -> getMwTitleArt() . " est effacé !";              
            }else{
                $response = "Un problème est survenu, réessayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=article';
                    }, 3000);
                </script>
            <?php
        }


        // info :
        if(isset($_GET['info-delete']) && ctype_digit($_GET['info-delete'])){
            $infoId = (int) $_GET['info-delete'];
            $infoById = $infoManager -> getOneById($infoId);
            try{
                $infoDelete = $infoManager -> deleteInfo($infoId);
                $pictureDelete = $pictureManager->deletePicture($infoById->getMwPictureMwIdPicture());
            }catch(Exception $e){
                $e -> getMessage();
            }
            
            if($infoDelete){
                $response = "Information : " . $infoById -> getMwIdInfo() . " est effacé !";              
            }else{
                $response = "Un problème est survenu, réessayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=info';
                    }, 3000);
                </script>
            <?php 
        }

        
        // RESSOURCE :
        if(isset($_GET['ressource-delete'])){

            $ressourceId = (int) $_GET['ressource-delete'];
            $ressourceById = $ressourceManager -> getOneById($ressourceId);
            try{
                $ressourceDelete = $ressourceManager -> deleteressource($ressourceId);
                $pictureDelete = $pictureManager->deletePicture($ressourceById->getMwPictureMwIdPicture());
            }catch(Exception $e){
                $e -> getMessage();
            }
            
            if($ressourceDelete){
                $response = "Ressource intitulé : " . $ressourceById -> getMwTitleRessource() . " est effacé !";              
            }else{
                $response = "Un problème est survenu, réessayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        window.location = './?p=ressource';
                    }, 3000);
                </script>
            <?php 
        }


        // CATEGORY : 
        // -- METTRE LE BOUTON DANS LE CRUD DES RESSOURECES --
        if(isset($_GET['category-delete'])){
            $categoryId = (int) $_GET['category-delete'];
            $categoryById = $ressourceManager-> getCategById($categoryId);
            try{
                $categoryDelete = $ressourceManager->deleteCategory($categoryId);
                $pictureDelete = $pictureManager->deletePicture($ressourceById->getMwPictureMwIdPicture());
            }catch(Exception $e){
                $e -> getMessage();
            }
            
            if($categoryDelete){
                $response = "Ressource intitulé : " . $categoryById -> getMwTitleCategory() . " est effacé !";              
            }else{
                $response = "Un problème est survenu, réessayez !";
            }
            ?>
                <script>
                    window.setTimeout(function() {
                        // PIS ON RETOURNE SUR LA PAGE DES RESSOURCES :
                        window.location = './?p=ressource';
                    }, 3000);
                </script>
            <?php 
        }


        // navigation privée (en tant qu'admin) :
        if(isset($_GET['p'])){

            if($_GET['p']==="admin"){
                include_once '../view/privateView/admin.php';
            }
            else if($_GET['p']==="agendaCrud"){
                include_once '../view/privateView/agendaCrud.php';
            }
            else if($_GET['p']==="article"){
                $allArticle = $articleManager->getAll();
                include_once '../view/privateView/articleCrud.php';
            }
            else if($_GET['p']==="info"){
                include_once '../view/privateView/infoCrud.php';
            }
            else if($_GET['p']==="livredorCrud"){
                include_once '../view/privateView/livreDorCrud.php';
            }
            else if($_GET['p']==="patient"){
                $allPatient = $patientManager->getAll();
                include_once '../view/privateView/patientCrud.php';
            }
            else if($_GET['p']==="ressourceCrud"){
                include_once '../view/privateView/ressourceCrud.php';
            }
            else if($_GET['p']==="section"){
                include_once '../view/privateView/sectionCrud.php';
            }
            else if($_GET['p']==="user"){
                $userManager->getAll();
                include_once '../view/privateView/userCrud.php';
            }


            ### LES UPDATE :
            // AGENDA UPDATE
            else if($_GET['p']==="agenda-update"){
                if(isset($_GET['agenda-update']) && ctype_digit($_GET['agenda-update'])){
                    $agendaId = (int) $_GET['agenda-update']; 
                    $agendaById = $agendaManager -> getOneWithPic($agendaId);
                    $pictureByAgendaId = $pictureManager -> getOneById($agendaById->getMwPictureMwIdPicture());
                }

                if(isset($_POST['mw_update_title_agenda'], $_POST['mw_update_date_agenda'], $_POST['mw_update_content_agenda'])){
                    
                    $pictureUpdateMap = new MappingPicture([
                        'mwTitlePicture' => $_POST['mw_update_title_pic'],
                        'mwUrlPicture' => $_POST['mw_update_url_pic'],
                        'mwSizePicture' => $_POST['mw_update_size_pic'],
                        'mwPositionPicture' => $_POST['mw_update_position_pic'],
                        'mwIdPicture' =>  $pictureByAgendaId -> getMwIdPicture(),
                    ]);

                    $agendaUpdateMap = new MappingAgenda([
                        'mwDateAgenda' => $_POST['mw_update_date_agenda'],
                        'mwContentAgenda' => $_POST['mw_update_content_agenda'],
                        'mwTitleAgenda' => $_POST['mw_update_title_agenda'], 
                        'mwPictureMwIdPicture' => $pictureByAgendaId -> getMwIdPicture(),
                        'mwIdAgenda' => $agendaId,
                    ]);

                    $updateAgenda = $agendaManager -> updateAgenda($pictureUpdateMap, $agendaUpdateMap);

                    if($updateAgenda){
                        $response = "Evénement mis à jour !";
                    } else {
                        $response = "Un problème est survenu, réssayez !";
                    }

                    ?>
                    <script>
                        window.setTimeout(function() {
                            window.location = './?p=agendaCrud';
                        }, 3000);
                    </script>
                    <?php
                }
                include_once "../view/privateView/editView/agendaEdit.php";
            }
            
            // ARTCILE UPDATE
            else if($_GET['p']==="article-update"){
                if(isset($_GET['article-update']) && ctype_digit($_GET['article-update'])){
                    $articleId = (int) $_GET['article-update']; 
                    $pictures = $pictureManager -> getAllByArticleId($articleId);
                    $articleById = $articleManager -> getOneById($articleId);
                    
                }
                if(isset($_POST['mw_update_title_art'], $_POST['mw_update_content_art'], $_POST['mw_update_visible_art'], $_POST['mw_update_section_mw_update_id_section'])){        
                    $articleUpdateMap = new MappingArticle([
                        "mwTitleArt" => $_POST['mw_update_title_art'],
                        "mwContentArt" => $_POST['mw_update_content_art'],
                        "mwVisibleArt" => $_POST['mw_update_visible_art'],
                        "mwSectionMwIdSection" => $_POST['mw_update_section_mw_update_id_section'],
                        "MwIdArticle" => $articleId
                    ]);
                
                    $pictureUpdateArray = [];
                    foreach ($pictures as $key => $picture) {
                        $pictureUpdateMap = new MappingPicture([
                            'mwTitlePicture' => $_POST['mw_update_pic_title_art'][$key],
                            'mwUrlPicture' => $_POST['mw_update_pic_url_art'][$key],
                            'mwSizePicture' => 1,
                            'mwPositionPicture' => 1,
                            'mwArticleMwIdArticle'=> $articleId,
                            'mwIdPicture'=> $picture -> getMwIdPicture()
                        ]);
                        $pictureUpdateArray[] = $pictureUpdateMap;  
                    }
                    
                    $updateArticle = $articleManager -> updateArticleWithPic($articleUpdateMap, $pictureUpdateArray);
                    if($updateArticle){
                        $response = "article enregistrer !";
                    } else {
                        $response = "Un problème est survenu, réssayez !";
                    }
                    ?>
                        <script>
                            window.setTimeout(function() {
                                window.location = './?p=article';
                            }, 3000);
                        </script>
                    <?php

                }  
                // var_dump($pictureUpdateArray);
                include_once '../view/privateView/editView/articleEdit.php';
            }

            else if($_GET['p']==="info-update"){
                if(isset($_GET['info-update']) && ctype_digit($_GET['info-update'])){
                    $infoId = (int) $_GET['info-update']; 
                    $pictures = $pictureManager -> getOneById($infoId);
                    $infoById = $infoManager->getOneById($infoId);
                    
                }
                if(isset($_POST['mw_update_date_info'], $_POST['mw_update_content_info'])){
                    
                    $pictureUpdateMap = new MappingPicture([
                        'mwTitlePicture' => $_POST['mw_update_title_pic'],
                        'mwUrlPicture' => $_POST['mw_update_url_pic'],
                        'mwSizePicture' => $_POST['mw_update_size_pic'],
                        'mwPositionPicture' => $_POST['mw_update_position_pic'],
                        'mwIdPicture' =>  $pictures -> getMwIdPicture(),
                    ]);

                    $infoUpdateMap = new MappingInfo([
                        'mwDateInfo' => $_POST['mw_update_date_info'],
                        'mwContentInfo' => $_POST['mw_update_content_info'],
                        'mwPictureMwIdPicture' => $pictures-> getMwIdPicture(),
                        'mwIdInfo' => $infoId,
                    ]);

                    $updateInfo = $infoManager -> updateInfo($pictureUpdateMap, $infoUpdateMap);

                    if($updateInfo){
                        $response = "Information mis à jour !";
                    } else {
                        $response = "Un problème est survenu, réssayez !";
                    }

                    ?>
                    <script>
                        window.setTimeout(function() {
                            window.location = './?p=info';
                        }, 3000);
                    </script>
                    <?php
                }
                include_once '../view/privateView/editView/infoEdit.php';
            }



            // On permet de naviguer dans les pages publiques en étant connecté
            else if($_GET['p'] === "home"){
                // on a créé les variables en haut parce qu"on en a besoin à 3 endroits différents
                include_once "../view/publicView/homepage.php";
            }
        
            else if($_GET['p'] === "contact"){
                // on va afficher les infos dans la page contact alors on les appelle ici :
                $allInfo = $infoManager -> getAll();
                include_once "../view/publicView/contactView.php";
            }
        
            else if($_GET['p'] === "ressources"){
                // on recupère toutes les catégories:
                $getAllCateg = $ressourceManager -> getAllCateg();
        
                // on récupère toutes les sous catégories :
                $getAllSub = $ressourceManager -> getAllSubCateg();
                include_once "../view/publicView/ressourcesView.php";
            }
        
            else if($_GET['p'] === "livreDor"){
                // appel de la méthode pour récup les messages du livre d'or avec visible=1 :
                $allLivreDor = $livreManager -> getAllVisible();
    
                // appel de la vue:
                include_once "../view/publicView/livreDorView.php";
            }
        
            else if($_GET['p']==="connect"){
                include_once "../view/publicView/connectView.php";
            }

            else if($_GET['p']==="agenda"){
                include_once "../view/publicView/agendaView.php";
            }

            else{
                include_once "../view/404.php";   
            }
        }

        // affichage des sections :
        else if(isset($_GET['sectionId']) && ctype_digit($_GET['sectionId'])){
            // on stocke l'id de la section
            $idSect = (int) $_GET['sectionId'];

            // on récup la section avec l'id pour afficher le titre
            $sectionById = $sectionManager -> getOneById($idSect);
            
            // on fait le manager des articles
            $articleBySection = $articleManager -> getAllArticlesWithPictures($idSect);
            
        // var_dump($articleBySection);
            include_once "../view/publicView/sectionView.php";
        }

        // formulaire de contact :
        else if(isset($_POST['nameContact'], $_POST['mailContact'], $_POST['messageContact'])){
            // envois message / mailer
        }

        else {
            include_once "../view/publicView/homepage.php";
        }

    }

    ## NAVIGATION PUBLIQUE :
    else if(isset($_GET['p'])){

        if($_GET['p'] === "home"){
            // on a créé les variables en haut parce qu"on en a besoin à 3 endroits différents
            include_once "../view/publicView/homepage.php";
        }
    
        else if($_GET['p'] === "contact"){
            // on va afficher les infos dans la page contact alors on les appelle ici :
            $allInfo = $infoManager -> getAll();
            include_once "../view/publicView/contactView.php";
        }
    
        else if($_GET['p'] === "ressources"){
            // on recupère toutes les catégories:
            $getAllCateg = $ressourceManager -> getAllCateg();
    
            // on récupère toutes les sous catégories :
            $getAllSub = $ressourceManager -> getAllSubCateg();
            include_once "../view/publicView/ressourcesView.php";
        }

        else if($_GET['p']==="agenda"){
            include_once "../view/publicView/agendaView.php";
        }
        
        else if($_GET['p'] === "livreDor"){
            // appel de la méthode pour récup les messages du livre d'or avec visible=1 :
            $allLivreDor = $livreManager -> getAllVisible();
    
            // insertion nouveau message dans le livre d'or :
            if(isset($_POST['nameLO'], $_POST['mailLO'], $_POST['messageLO'])){
                // insertion dans le livre d'or
                $newMessageLO = new MappingLivreDor([
                    "mwNameLivreDor" => $_POST['nameLO'],
                    "mwMailLivreDor" => $_POST['mailLO'],
                    "mwMessageLivreDor" => $_POST['messageLO'],
                ]);
                $insertLO = $livreManager -> insertLivreDor($newMessageLO);
            }
            // appel de la vue:
            include_once "../view/publicView/livreDorView.php";
        }
    
        else if($_GET['p']==="connect"){
            include_once "../view/publicView/connectView.php";
        }
        else{
            include_once "../view/404.php";
        }
        
    }

    // affichage des sections :
    else if(isset($_GET['sectionId']) && ctype_digit($_GET['sectionId'])){
        // on stocke l'id de la section
        $idSect = (int) $_GET['sectionId'];

        // on récup la section avec l'id pour afficher le titre
        $sectionById = $sectionManager -> getOneById($idSect);
        
        // on fait le manager des articles
        $articleBySection = $articleManager -> getAllArticlesWithPictures($idSect);
        
    // var_dump($articleBySection);
        include_once "../view/publicView/sectionView.php";
    }

    // formulaire de contact :
    else if(isset($_POST['nameContact'], $_POST['mailContact'], $_POST['messageContact'])){
        // envois message / mailer
    }

    else {
        include_once "../view/publicView/homepage.php";
    }

