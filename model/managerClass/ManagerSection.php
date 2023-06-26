<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\mappingSection;
use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingPicture;
use PDO;


// use ManagerInterface:

class ManagerSection implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id){
        $sql = "SELECT * FROM mw_section WHERE mw_id_sect = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingSection($result);
        }else{
            throw new Exception("cette section $id n'existe pas" );
        }

    }


    public function getAll(){

        $sql = "SELECT s.* , GROUP_CONCAT(p.mw_id_picture, '|||' , p.mw_url_picture , '|||', p.mw_title_picture SEPARATOR '---') AS picture 
        FROM mw_section s
        LEFT JOIN mw_picture p ON p.mw_id_picture = s.mw_picture_mw_id_picture
        GROUP BY s.mw_id_sect";
        
        $prepare = $this->db->prepare($sql);
        // exécution de la requête
        $prepare->execute();
        // récupération du résultat
        $result = $prepare->fetchAll();
        // on crée un tableau vide
        $sections = [];
        // on parcourt le résultat
        foreach ($result as $row){
            // on crée un objet Theuser que l'on ajoute dans le tableau
            $sections[] = new MappingSection($row);           
    
            // on retourne le tableau
        }
        return $sections;
    }  


    public function insertSectionWithPic(MappingPicture $dataP, MappingSection $dataS){

        $this->db->beginTransaction();
        
        $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`) VALUES (:titlePic,:urlPic,:sizePic,:positionPic)";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindValue(':titlePic', $dataP->getMwTitlePicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':sizePic', 29, PDO::PARAM_INT);
        $preparePic->bindValue(':positionPic',$dataP->getMwPositionPicture(), PDO::PARAM_INT);

        
        $preparePic->execute();
        

        $lastId = $this->db->lastInsertId();


        $sqlSect = "INSERT INTO `mw_section`(`mw_title_sect`, `mw_content_sect`, `mw_visible_sect`, `mw_picture_mw_id_picture`) VALUES (:titleSect,:contentSect,:visibleSect, :pictureSect)";      
        $prepareSect = $this->db->prepare($sqlSect);
        $prepareSect->bindValue(':titleSect', $dataS->getMwTitleSect(),PDO::PARAM_STR);
        $prepareSect->bindValue(':contentSect', $dataS->getMwContentSect(), PDO::PARAM_STR);
        $prepareSect->bindValue(':visibleSect', $dataS->getMwVisible(), PDO::PARAM_INT);
        $prepareSect->bindValue(':pictureSect', $lastId, PDO::PARAM_INT);
        
        $prepareSect->execute();
       
        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        }
    }


    public function deleteSection(int $id){
        $sql = "DELETE FROM mw_section WHERE mw_id_sect = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
        
    }


    public function updateSectionWithPic(string $titlePic, string $urlPic, int $sizePic, int $positionPic, int $idPic, 
        string $titleSect, string $contentSect, int $visibleSect, int $idSect){ 

        $this->db->beginTransaction();
        
        $sqlPic = "UPDATE `mw_picture` 
                    SET `mw_title_picture`= :titlePic ,`mw_url_picture`= :urlPic, `mw_size_picture`= :sizePic, `mw_position_picture`= :positionPic 
                    WHERE `mw_id_picture`= :idPic";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindParam(':titlePic', $titlePic,PDO::PARAM_STR);
        $preparePic->bindParam(':urlPic', $urlPic,PDO::PARAM_STR);
        $preparePic->bindParam(':sizePic', $sizePic, PDO::PARAM_INT);
        $preparePic->bindParam(':positionPic',$positionPic, PDO::PARAM_INT);
        $preparePic->bindParam(':idPic',$idPic, PDO::PARAM_INT);

        $preparePic->execute();


        $sqlSect = "UPDATE `mw_section` 
                    SET `mw_title_sect`= :titleSect, `mw_content_sect`= :contentSect, `mw_visible_sect`= :visibleSect  ,`mw_picture_mw_id_picture`= :idPic 
                    WHERE `mw_id_sect` = :idSect";      
        $prepareSect = $this->db->prepare($sqlSect);
        $prepareSect->bindParam(':titleSect', $titleSect,PDO::PARAM_STR);
        $prepareSect->bindParam(':contentSect', $contentSect, PDO::PARAM_STR);
        $prepareSect->bindParam(':visibleSect', $visibleSect, PDO::PARAM_INT);
        $prepareSect->bindParam(':idPic', $idPic, PDO::PARAM_INT);
        $prepareSect->bindParam(':idSect', $idSect, PDO::PARAM_INT);

        
        $prepareSect->execute();
       
        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        } 

    }


}