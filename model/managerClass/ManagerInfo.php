<?php

namespace model\managerClass;

use PDO;
use Exception;
use model\mappingClass\MappingInfo;
use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingPicture;


// use ManagerInterface:

class ManagerInfo implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id)
    {
        $sql = "SELECT * FROM mw_info WHERE mw_id_info = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingInfo($result);
        }else{
            throw new Exception("cette information $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT i.* , mw_picture.mw_url_picture AS picture
        FROM mw_info i
        LEFT JOIN mw_picture ON mw_picture.mw_id_picture = i.mw_picture_mw_id_picture
        GROUP BY i.mw_id_info";
        
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $info = [];
        foreach ($result as $row){
            $info[] = new MappingInfo($row);               
        }
        return $info;
    }  


    public function insertInfo(MappingPicture $dataP, MappingInfo $dataI){

        $this->db->beginTransaction();

        $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`) VALUES (:titlePic,:urlPic,:sizePic,:positionPic)";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindValue(':titlePic', $dataP->getMwTitlePicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':sizePic', $dataP->getMwSizePicture(), PDO::PARAM_INT);
        $preparePic->bindValue(':positionPic',$dataP->getMwPositionPicture(), PDO::PARAM_INT);

        try{
            $preparePic->execute();
        }catch(Exception $e){
            echo $e->getMessage();
        }

        
        

        $lastId = $this->db->lastInsertId();


        $sql = "INSERT INTO `mw_info`(`mw_content_info`, `mw_date_info`, `mw_picture_mw_id_picture`) 
        VALUES (:content, :date, :picture)";  

        $prepareInfo = $this->db->prepare($sql);
        $prepareInfo->bindValue(':content', $dataI->getMwContentInfo(), PDO::PARAM_STR);
        $prepareInfo->bindValue(':date', $dataI->getMwDateInfo(), PDO::PARAM_STR);
        $prepareInfo->bindValue(':picture', $lastId, PDO::PARAM_INT);
        
        try{
            $prepareInfo->execute();
            $this->db->commit();
        }catch(Exception $e){
            $this->db->rollBack();
            echo $e -> getMessage();
        }
    }


    public function deleteInfo($id){
        $sql = "DELETE FROM mw_info WHERE mw_id_info = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updateInfo(MappingPicture $dataP, MappingInfo $dataI){

        $this->db->beginTransaction();
        
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


        $sql = "UPDATE `mw_info` 
                SET `mw_content_info`= :content, `mw_date_info`= :date, `mw_picture_mw_id_picture`= :picture
                WHERE `mw_id_info`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':content', $dataI -> getMwContentInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':date', $dataI -> getMwDateInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':picture', $dataI -> getMwPictureMwIdPicture(), PDO::PARAM_INT);
        $prepare->bindValue(':id', $dataI -> getMwIdInfo(), PDO::PARAM_INT);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}