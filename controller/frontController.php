<?php
/* Je pensais mettre juste un controlleur
1- y'a pas une admin trop complexe
2- comme ça la madame peut naviguer son site en étant connectée sans que ça nous file des mots de tête -->
*/
use model\model;

// redirection vers la homepage par défaut / à compléter par après:
$test = new model(["test" => "test"]);


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

    if($_GET['p']){
        if($_GET['p'] === "formPwd"){
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

        else if(isset($_GET['idRessource']) && ctype_digit($_GET['idRessource']) ){
            include_once "../view/privateView/ressourcesEditView.php";
        }

        else if(isset($_GET['idArticle']) && ctype_digit($_GET['idArticle'])){
            include_once "../view/privateView/articleEditView.php";
        }

        else if(isset($_GET['deleteRessources']) && ctype_digit(($_GET['deleteRessources']))){
            // header("Location: ./?m=L'article dont l'id est $idRessource a été supprimé");
        }

        else if(isset($_GET['deleteArticle']) && ctype_digit(($_GET['deleteArticle']))){
           // header("Location: ./?m=L'article dont l'id est $idArticle a été supprimé");
        }

        else if(isset($_GET['visibleLO']) && ctype_digit($_GET['visibleLO'])){
            header("location: ./");
        }

        else if(isset($_GET['deleteLO']) && ctype_digit($_GET['deleteLO'])){
            header("location: ./");
        }

        else if(isset($_GET['banLO']) && ctype_digit($_GET['benLO'])){
            header("location: ./");          
        }
    }

    require_once "../view/privateView/admin.php";
}


else if($_GET['p']){

    if($_GET['p'] === "contact"){
        include "../view/publicView/contactView.php";
    }

    if($_GET['p'] === "ressources"){
        include "../view/publicView/ressourcesView.php";
    }

    if($_GET['p'] === "livreDor"){
        include "../view/publicView/livreDorView.php";
    }

}


else {


    include_once "../view/publicView/homepage.php";
}

