<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\MappingRessource;
use model\mappingClass\MappingCategoryRessource;
use model\mappingClass\MappingSubCategoryRessource;
use model\mappingClass\MappingPicture;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerRessource implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this -> db = $db;
    }


    public function getOneById($id){
        $prepare = $this->db->prepare("SELECT * FROM mw_ressource WHERE mw_id_ressource = :id");
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetch();
        if ($result) {
            return new MappingRessource($result);
        } else {
            throw new Exception("La ressource $id n'existe pas");
        }
    }



    public function getAll(){
        $prepare = $this->db->prepare("SELECT * FROM `mw_ressource`");
        $prepare->execute();
        $result = $prepare->fetchAll();
        $ressources = [];
        foreach ($result as $row) {
            $ressources[] = new MappingRessource($row);
        }
            
        return $ressources;

    }


    public function getAllCateg(){
        $prepare = $this->db->prepare("SELECT * FROM `mw_category_ressource`");
        $prepare->execute();
        $result = $prepare->fetchAll();
        $categories = [];
        foreach ($result as $row) {
            $categories[] = new MappingCategoryRessource($row);
        }
            
        return $categories;

    }

    public function getAllSubCateg(){
        $prepare = $this->db->prepare("SELECT * FROM `mw_sub_category_ressource`");
        $prepare->execute();
        $result = $prepare->fetchAll();
        $subs = [];
        foreach ($result as $row) {
            $subs[] = new MappingSubCategoryRessource($row);
        }
            
        return $subs;

    }

        public function getCategById($id){
        $prepare = $this -> db ->prepare("SELECT * FROM mw_category_ressource WHERE mw_id_category = :id");
        $prepare -> bindValue(':id', $id, PDO::PARAM_INT);
        $prepare-> execute();
        $result = $prepare-> fetch();
        if($result){
            return new MappingCategoryRessource($result);
        }else{
            throw new Exception("il n'y pas de catégrory à l'id $id");
        }
    }

    public function getSubById($id){
        $prepare = $this -> db ->prepare("SELECT * FROM mw_sub_category_ressource WHERE mw_id_sub_category = :id");
        $prepare -> bindValue(':id', $id, PDO::PARAM_INT);
        $prepare-> execute();
        $result = $prepare-> fetch();
        if($result){
            return new MappingSubCategoryRessource($result);
        }else{
            throw new Exception("il n'y pas de sous catégrory à l'id $id");
        }
    }


    public function getAllbyAll($idCateg, $idSub){
        $prepare = $this->db->prepare("SELECT * FROM `mw_ressource` 
            WHERE mw_category = :idCateg AND mw_sub_category = :idSub
            ORDER BY mw_category; 
        ");
        $prepare->bindValue(':idCateg', $idCateg, PDO::PARAM_INT);
        $prepare->bindValue(':idSub', $idSub, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $ressources = [];
        foreach ($result as $row) {
            $ressources[] = new MappingRessource($row);
        }
            
        return $ressources;
    }



    public function insertRessource(MappingPicture $dataPic = null, MappingCategoryRessource $dataCateg = null, MappingSubCategoryRessource $dataSub = null, MappingRessource $dataRess){

        $this->db->beginTransaction();
        
        // on vérifie si y'a une photo insérée avec l'évenement :
        if(!empty($dataPic)){

            // si oui on insére la nouvelle photo dans la db
            $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`) 
                        VALUES (:titlePic, :urlPic, :sizePic, :positionPic)";      
            $preparePic = $this->db->prepare($sqlPic);
            $preparePic->bindValue(':titlePic', $dataPic->getMwTitlePicture(),PDO::PARAM_STR);
            $preparePic->bindValue(':urlPic', $dataPic->getMwUrlPicture(),PDO::PARAM_STR);
            $preparePic->bindValue(':sizePic', $dataPic->getMwSizePicture(), PDO::PARAM_INT);
            $preparePic->bindValue(':positionPic',$dataPic->getMwPositionPicture(), PDO::PARAM_INT);
            
            $preparePic->execute();
            
            // on recupére son ID
            $lastIdPic = $this->db->lastInsertId();

        }else{

            // si non on récupère l'ID existant dans la variable:
            $lastIdPic = null;

        }


        // On verifie si l'utilisateur a rentré une nouvelle catégorie: 
        if(!empty($dataCateg)){
            // si oui on insére la nouvelle catégori dans la db
            $sqlCateg = "INSERT INTO `mw_category_ressource`(`mw_title_category`) 
                        VALUES (:titleCateg)";
            $prepareCateg = $this->db->prepare($sqlCateg);
            $prepareCateg->bindValue(':titleCateg', $dataCateg->getMwTitleCategory(), PDO::PARAM_STR);

            $prepareCateg->execute();

            // on recupére son ID
            $lastIdCateg = $this->db->lastInsertId();
        } else {

            // si non on récupère l'ID existant dans la variable:
            $lastIdCateg = $dataRess->getMwCategory();
        }


        // On verifie si l'utilisateur a rentré une nouvelle sous catégorie: 
        if(!empty($dataSub)){
            // si oui on insére la nouvelle sous catégori dans la db
            $sqlSub = "INSERT INTO `mw_sub_category_ressource`(`mw_title_sub_category`) 
                        VALUES (:titleSub)";
            $prepareSub = $this->db->prepare($sqlSub);
            $prepareSub->bindValue(':titleSub', $dataSub-> getMwTitleSubCategory(), PDO::PARAM_STR);

            $prepareSub->execute();

            // on recupére son ID
            $lastIdSub = $this->db->lastInsertId();

        } else {
            // si non on récupère l'ID existant dans la variable:
            $lastIdSub = $dataRess->getMwSubCategory();
        }
        

        $sqlRess = "INSERT INTO `mw_ressource`(`mw_title_ressource`, `mw_content_ressource`, `mw_url_ressource`, `mw_date_ressource`, `mw_category`, `mw_sub_category`, `mw_picture_mw_id_picture`) 
                    VALUES (:titleRess, :contentRess, :urlRess, :dateRess, :categRess, :subCategRess, :picture)";      
        $prepareRess = $this->db->prepare($sqlRess);
        $prepareRess->bindValue(':titleRess', $dataRess->getMwTitleRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':contentRess', $dataRess->getMwContentRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':urlRess', $dataRess->getMwUrlRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':dateRess', $dataRess->getMwDateRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':categRess', $lastIdCateg, PDO::PARAM_INT);
        $prepareRess->bindValue(':subCategRess', $lastIdSub, PDO::PARAM_INT);
        $prepareRess->bindValue(':picture', $lastIdPic, PDO::PARAM_INT);
        
        $prepareRess->execute();
       
        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        }
    }

    public function updateRessource(MappingPicture $dataP, MappingCategoryRessource $dataC, MappingSubCategoryRessource $dataS, MappingRessource $dataR){

        $this->db->beginTransaction();
        
        // update pic
        $sqlPic = "UPDATE `mw_picture` 
                    SET `mw_title_picture`= :titlePic ,`mw_url_picture`= :urlPic, `mw_size_picture`= :sizePic, `mw_position_picture`= :positionPic 
                    WHERE `mw_id_picture`= :idPic";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindValue(':titlePic', $dataP->getMwTitlePicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':sizePic', $dataP->getMwSizePicture(), PDO::PARAM_INT);
        $preparePic->bindValue(':positionPic', $dataP->getMwPositionPicture(), PDO::PARAM_INT);
        $preparePic->bindValue(':idPic', $dataP->getMwIdPicture(), PDO::PARAM_INT);
        $preparePic->execute();

        // update category :
        $sqlCateg = "UPDATE `mw_category_ressource` 
                    SET `mw_title_category`=:titleCateg WHERE `mw_id_category`= :idCateg";
        $prepareCateg = $this->db->prepare($sqlCateg);
        $prepareCateg->bindValue(':titleCateg', $dataC->getMwTitleCategory(), PDO::PARAM_STR);
        $prepareCateg->bindValue(':idCateg', $dataC->getMwIdCategory(), PDO::PARAM_INT);
        $prepareCateg->execute();
        
        // update subCategory :
        $sqlSub = "UPDATE `mw_sub_category_ressource` SET `mw_title_sub_category`=:titleCateg WHERE `mw_id_sub_category`= :idCateg";
        $prepareSub = $this->db->prepare($sqlSub);
        $prepareSub->bindValue(':titleCateg', $dataS->getMwTitleSubCategory(), PDO::PARAM_STR);
        $prepareSub->bindValue(':idCateg', $dataS->getMwIdSubCategory(), PDO::PARAM_INT);
        $prepareSub->execute();

        // update ressource : 
        $sqlress = "UPDATE `mw_ressource` 
                    SET `mw_title_ressource`= :titleRess, `mw_content_ressource`= :contentRess, `mw_url_ressource`= :urlRess, `mw_date_ressource`= :dateRess, `mw_category`= :categRess,`mw_sub_category`= :subRess, `mw_picture_mw_id_picture`= :picRess
                    WHERE `mw_id_ressource`= :idRess";
        $prepareRess = $this->db->prepare($sqlress);
        $prepareRess->bindValue(':titleRess', $dataR->getMwTitleRessource(),PDO::PARAM_STR);
        $prepareRess->bindValue(':contentRess', $dataR->getMwContentRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':urlRess', $dataR->getMwUrlRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':dateRess', $dataR->getMwDateRessource(), PDO::PARAM_STR);
        $prepareRess->bindValue(':categRess', $dataC->getMwIdCategory(), PDO::PARAM_INT);
        $prepareRess->bindValue(':subRess', $dataS->getMwIdSubCategory(), PDO::PARAM_INT);
        $prepareRess->bindValue(':picRess', $dataP->getMwIdPicture(), PDO::PARAM_INT);
        $prepareRess->bindValue(':idRess', $dataR-> getMwIdRessource(), PDO::PARAM_INT);
        $prepareRess->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        }

    }

    public function deleteRessource(int $id){
        $sql = "DELETE FROM mw_Ressource WHERE mw_id_ressource = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }     
    }

}