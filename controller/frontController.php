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

### info :
$infoManager = new ManagerInfo($db);

### ressources : 
$ressourceManager = new ManagerRessource($db);

### patient :
$patientManager = new ManagerPatient($db);

### agenda :
$agendaManager = new ManagerAgenda($db);

### picture 
$pictureManager = new ManagerPicture($db);

##########################################################


#############CONNECION / DECONNEXION #####################
// deconnection de l'admin
if(isset($_GET['deconnect'])){
    $userManager->disconnect();         
    header("Location: ./");
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
else if(isset($_GET['p'])){

    // navigation publique :
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

    // Suite du $_get si l'admin est connecté :
    else if(isset($_SESSION['idSession']) && $_SESSION['idSession']==session_id()){
        if($_GET['p']==="admin"){
            include_once '../view/privateView/admin.php';
        }
        else if($_GET['p']==="agenda"){
            include_once '../view/privateView/agendaCrud.php';
        }
        else if($_GET['p']==="article"){
            include_once '../view/privateView/articleCrud.php';
        }
        else if($_GET['p']==="info"){
            include_once '../view/privateView/infoCrud.php';
        }
        else if($_GET['p']==="livredor"){
            include_once '../view/privateView/livreDorCrud.php';
        }
        else if($_GET['p']==="patient"){
            $allPatient = $patientManager->getAll();
            include_once '../view/privateView/patientCrud.php';
        }
        else if($_GET['p']==="ressource"){
            include_once '../view/privateView/ressourceCrud.php';
        }
        else if($_GET['p']==="section"){
            include_once '../view/privateView/sectionCrud.php';
        }
        else if($_GET['p']==="user"){
            $userManager->getAll();
            include_once '../view/privateView/userCrud.php';
        }

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
        }  
        
        // insert patient :
        if(isset($_POST['patient-insert-name'], $_POST['patient-insert-surname'], $_POST['patient-insert-birthdate'], $_POST['patient-insert-mail'], $_POST['patient-insert-phone'])){
            $patientInsertMap = new MappingPatient([
                "mwNamePatient" => $_POST['patient-insert-name'],
                "mwSurnamePatient" => $_POST['patient-insert-surname'],
                "mwBirthdatePatient" => $_POST['patient-insert-birthdate'],
                "mwMailPatient" => $_POST['patient-insert-mail'],
                "mwPhonePatient" => $_POST['patient-insert-phone'],
            ]);
            $insertPatient = $patientManager->insertPatient($patientInsertMap);
        }  
        
        // insert ressource :
        if(isset($_POST['insertRessource'])){
            // je le fais plus tard parce que c'est le plus dur
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
        }  
             

        // les updates :
        if(isset($_GET['idAgenda']) && ctype_digit($_GET['idAgenda'])){
            include_once "../view/privateView/articleEditView.php";
        }

        if(isset($_GET['idRessource']) && ctype_digit($_GET['idRessource']) ){
            include_once "../view/privateView/ressourcesEditView.php";
        }

        if(isset($_GET['idArticle']) && ctype_digit($_GET['idArticle'])){
            include_once "../view/privateView/articleEditView.php";
        }
        
        
        // les deletes (ça marche pas) :
        if(isset($_GET['agenda-delete']) && ctype_digit($_GET['agenda-delete'])){
            $agendaId = (int) $_GET['agenda-delete'];
            var_dump($agendaId);

            try {
                $agendaDelete = $agendaManager->deleteAgenda($agendaId);
            }catch(Exception $e){
                $e -> getMessage();
            }

            if($agendaDelete){
                $response = "Evenement effacé ! ";
            }else{
                $response = "Un problème est survenu, réessayez ! ";
            }
        }


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

