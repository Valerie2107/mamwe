<?php
/* Je pensais mettre juste un controlleur
1- y'a pas une admin trop complexe
2- comme ça la madame peut naviguer son site en étant connectée sans que ça nous file des mots de tête -->
*/

use model\managerClass\ManagerSection;

$sectionManager = new ManagerSection($db); 

$sections = $sectionManager -> getAll();


foreach($sections as $section){
    echo $section -> getMwTitleSect();
}


// echo $section -> getMwIdSection();

// quand on deconnect :
if(isset($_GET['deconnect'])){
    // if(deconnect()){
        //     header("location: ./");
        // }       
}
    
//check varaible $POST pour connexion :
if(isset($_POST['login'],$_POST['pwd'])){
    header("Location: ./");         
}  

if(isset($_SESSION['uniqueId'])&&$_SESSION['uniqueId']==session_id()){    
    
    if(isset($_POST['insertArticle'])){
        if( false /* verification des champs du formulaire ajout de sous section */ ){
            // $insertSS = insertSS($db);
        }
    }    

    if(isset($_POST['updateArticle'])){
        if( false /* verification des champs du formulaire mise a jour de sous section */ ){
            // $insertSS = insertSS($db);
        }
    } 

    if(isset($_POST['insertRessource'])){
        if( false /* verification des champs du formulaire ajout de ressource */ ){
            // $insertSS = insertSS($db);
        }
    } 

    if(isset($_POST['updateRessource'])){
        if( false /* verification des champs du formulaire mise a jour des ressources */ ){
            // $insertSS = insertSS($db);
        }
    } 

    if(isset($_POST['updatePwd'])){
        if( false /* verification des champs du formulaire mise a jour du mot de passe */ ){
            // $insertSS = insertSS($db);
        }
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
    

    require_once "../view/privateView/admin.php";
}


else if(isset($_GET['p'])){

    // navigation publique :
    if($_GET['p'] === "home"){
        include_once "../view/publicView/homepage.php";
    }

    else if($_GET['p'] === "contact"){
        include_once "../view/publicView/contactView.php";
    }

    else if($_GET['p'] === "ressources"){
        include_once "../view/publicView/ressourcesView.php";
    }

    else if($_GET['p'] === "livreDor"){
        // appel de la méthode pour récup les messages du livre d'or avec visible=1 :


        // appel de la vue:
        include_once "../view/publicView/livreDorView.php";
    }

    // nav privé
    else if($_GET['p'] === "formPwd"){
        include_once "../view/privateView/formPassword.php";
    }

    else if($_GET['p'] === "addRessource"){
        include_once "../view/privateView/ressourcesInsertView.php";
    }

    else if($_GET['p'] === "addArticle"){
        include_once "../view/privateView/articleInsertView.php";;
    }

    else if($_GET['p'] === "admin"){
        include_once "../view/privateView/admin.php";;
    }

    else{
        include_once "../view/publicView/homepage.php";
    }
    
}

else if(isset($_GET['sectionId']) && ctype_digit($_GET['sectionId'])){
    include_once "../view/publicView/section";
}

else if(isset($_GET['ressourcesId']) && ctype_digit($_GET['ressourcesId'])){
    include_once "../view/publicView/ressourcesView.php";
}

else if(isset($_POST['nameLO'], $_POST['mailLO'], $_POST['messageLO'])){
    // insertion dans le livre d'or
}

else if(isset($_POST['nameContact'], $_POST['mailContact'], $_POST['messageContact'])){
    // envois message / mailer
}


else {

    include_once "../view/publicView/homepage.php";
}

