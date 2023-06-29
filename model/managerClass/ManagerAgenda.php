<?php

namespace model\managerClass;

use model\mappingClass\MappingAgenda;
use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingPicture;
use PDO;
use Exception;


// use ManagerInterface:

class ManagerAgenda implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id) {
        $sql = "SELECT * FROM mw_agenda WHERE mw_id_agenda = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingAgenda($result);
        }else{
            throw new Exception("cet événement $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT a.* , mw_picture.mw_url_picture AS picture
        FROM mw_agenda a
        LEFT JOIN mw_picture ON mw_picture.mw_id_picture = a.mw_picture_mw_id_picture
        GROUP BY a.mw_id_agenda";

        $prepare = $this->db->prepare($sql);
        // exécution de la requête
        $prepare->execute();
        // récupération du résultat
        $result = $prepare->fetchAll();
        // on crée un tableau vide
        $date = [];
        // on parcourt le résultat
        foreach ($result as $row){
             // on crée un objet Theuser que l'on ajoute dans le tableau
            $date[] = new MappingAgenda($row);    
            // on retourne le tableau           
        }
        return $date;
    }  


    public function insertAgendaWithPict(MappingPicture $dataP, MappingAgenda $dataA){

        $this->db->beginTransaction();

        $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`) VALUES (:titlePic,:urlPic,:sizePic,:positionPic)";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindValue(':titlePic', $dataP->getMwTitlePicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':sizePic', $dataP->getMwSizePicture(), PDO::PARAM_INT);
        $preparePic->bindValue(':positionPic',$dataP->getMwPositionPicture(), PDO::PARAM_INT);

        
        $preparePic->execute();
        

        $lastId = $this->db->lastInsertId();


        $sql = "INSERT INTO `mw_agenda`(`mw_date_agenda`, `mw_content_agenda`, `mw_title_agenda`, `mw_picture_mw_id_picture`) VALUES (:date, :content, :title, :picture)";  
        $prepareAgenda = $this->db->prepare($sql);
        $prepareAgenda->bindValue(':date', $dataA->getMwDateAgenda(), PDO::PARAM_STR);
        $prepareAgenda->bindValue(':content', $dataA->getMwContentAgenda(), PDO::PARAM_STR);
        $prepareAgenda->bindValue(':title', $dataA->getMwTitleAgenda(), PDO::PARAM_STR);
        $prepareAgenda->bindValue(':picture', $lastId, PDO::PARAM_INT);

        $prepareAgenda->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        }
    }


    public function deleteAgenda($id){
        $sql = "DELETE FROM mw_agenda WHERE mw_id_agenda = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updateAgenda(MappingAgenda $data){
        $sql = "UPDATE `mw_agenda` 
                SET `mw_date_agenda`= :date, `mw_content_agenda`= :content, `mw_title_agenda`= :title, `mw_picture_mw_id_picture`= :picture
                WHERE `mw_id_agenda`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':date', $data -> getMwDateAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':content', $data -> getMwContentAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':title', $data -> getMwTitleAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':id', $data -> getMwIdAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':picture', $data -> getMwPictureMwIdPicture(), PDO::PARAM_STR);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}