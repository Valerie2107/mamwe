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


############# INSTANCIATION DE MANAGERS ##################

### VARIABLE DATE :
$currentDate = new Date();
$currentDate = $currentDate->format("Y-d-m");
#####


### RECUP LES SECTIONS POUR LA NAVBAR : 
// on stock l'object dans la variable
$sectionManager = new ManagerSection($db); 
// applique la méthode qui contient la requete SQL qui récupére toutes les section
$allSection = $sectionManager -> getAll();
#####


### HOMEPAGE : on récup les variables pour l'accueil ici parce qu'on va en avoir besoin en plusieur endroit :
// on stock le manager dans la variable:
$homeManager = new ManagerHomepage($db);
$allHome = $homeManager -> getAll();
##### 


### instanciation de ManagerUser pour se connecter ou pas :
$userManager = new ManagerUser($db);

### instanciation du manager d'articles :
$articleManager =  new ManagerArticle($db);

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
        $infoManager = new ManagerInfo($db);
        $allInfo = $infoManager -> getAll();

        include_once "../view/publicView/contactView.php";
    }

    else if($_GET['p'] === "ressources"){
        $ressourceManager = new ManagerRessource($db);

        // on recupère toutes les catégories:
        $getAllCateg = $ressourceManager -> getAllCateg();

        // on récupère toutes les sous catégories :
        $getAllSub = $ressourceManager -> getAllSubCateg();
        include_once "../view/publicView/ressourcesView.php";
    }

    else if($_GET['p'] === "livreDor"){
        
        $livreManager = new ManagerLivreDor($db);
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
        }
        
        $insertLO = $livreManager -> insertLivreDor($newMessageLO);

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
            $patientManager = new ManagerPatient($db);
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
        if(isset($_POST['contentAgenda'], $_POST['titleAgenda'], $_POST['dateAgenda'], $_POST['titlePic'], $_POST['urlPic'], $_POST['sizePic'], $_POST['positionPic'])){
            $agendaManager = new ManagerAgenda($db);

            $agendaMapping = new MappingAgenda([
                "mwDateAgenda" => $_POST['dateAgenda'],
                "mwContentAgenda" => $_POST['contentAgenda'],
                "mwTitleAgenda" => $_POST['titleAgenda'],
            ]); 

            $pictureMapping = new MappingPicture([
                "mwTitlePicture" => $_POST['titlePic'],
                "mwUrlPicture" => $_POST['urlPic'],
                "mwSizePicture" => $_POST['sizePic'],
                "mwPositionPicture" => $_POST['positionPic']
            ]);

            $insertAgenda = $agendaManager -> insertAgendaWithPict($pictureMapping, $agendaMapping);
        }  

        // Article : 
        if(isset($_POST['mw_title_art'], $_POST['mw_content_art'], $_POST['mw_visible_art'], $_POST['mw_section_mw_id_section'])){        
                $articleMapping = new MappingArticle([
                    "mwTitleArt" => $_POST['mw_title_art'],
                    "mwContentArt" => $_POST['mw_content_art'],
                    "mwVisibleArt" => $_POST['mw_visible_art'],
                    "mwSectionMwIdSection" => $_POST['mw_section_mw_id_section'],
                ]);
            
                $pictureArray = [];
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
                            $pictureArray[] = $picture;
                        }
                    }
                }
        
                $insertTestPost = $articleManager -> insertArticle($articleMapping, $pictureArray);

        }    
        if(isset($_POST['insertInfo'])){
            if( false /* verification des champs du formulaire ajout de sous section */){
                // $insertSS = insertSS($db);

            }
        }  
        if(isset($_POST['livreDor'])){
            if( false /* verification des champs du formulaire ajout de sous section */){
                // $insertSS = insertSS($db);

            }
        }  
        if(isset($_POST['patient'])){
            if( false /* verification des champs du formulaire ajout de sous section */){
                // $insertSS = insertSS($db);

            }
        }  
        if(isset($_POST['insertRessource'])){
            if( false /* verification des champs du formulaire ajout de ressource */ ){
                // $insertSS = insertSS($db);
            }
        } 
        if(isset($_POST['insertSection'])){
            if( false /* verification des champs du formulaire ajout de sous section */){
                // $insertSS = insertSS($db);

            }
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
        
        if(isset($_GET['deleteRessources']) && ctype_digit(($_GET['deleteRessources']))){
            // header("Location: ./?m=L'article dont l'id est $idRessource a été supprimé");
        }
        
        if(isset($_GET['deleteArticle']) && ctype_digit(($_GET['deleteArticle']))){
            // header("Location: ./?m=L'article dont l'id est $idArticle a été supprimé");
        }
        
        if(isset($_GET['visibleLO']) && ctype_digit($_GET['visibleLO'])){
            header("location: ./");
        }
        
        if(isset($_GET['deleteLO']) && ctype_digit($_GET['deleteLO'])){
            header("location: ./");
        }
        
        if(isset($_GET['banLO']) && ctype_digit($_GET['benLO'])){
            header("location: ./");          
        }
        if(isset($_POST['updatePwd'])){
            if( false /* verification des champs du formulaire mise a jour du mot de passe */ ){
                // $insertSS = insertSS($db);
            }
        } 
        
        // les deletes :

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
    
    var_dump($articleBySection);
    include_once "../view/publicView/sectionView.php";
}

// formulaire de contact :
else if(isset($_POST['nameContact'], $_POST['mailContact'], $_POST['messageContact'])){
    // envois message / mailer
}

else {
    include_once "../view/publicView/homepage.php";
}

