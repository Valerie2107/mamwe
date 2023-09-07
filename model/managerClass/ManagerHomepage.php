<?php

namespace model\managerClass;

use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingHomepage;
use model\mappingClass\MappingPicture;
use Exception;
use PDO;

class ManagerHomepage implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }
    

    public function getAll(){
        $sql = "SELECT *,  mw_picture.mw_url_picture AS picture
            FROM mw_homepage
            LEFT JOIN mw_picture
            ON mw_picture.mw_id_picture = mw_homepage.mw_picture_mw_id_picture";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetch();
        if($result){
            return new MappingHomepage($result);
        }else{
            throw new Exception("Cet article n'existe pas !");
        }
    }


    public function updateHomepage(MappingPicture $dataP, MappingHomepage $dataH){

        $this->db->beginTransaction();

        // update pic
        $sqlPic = "UPDATE `mw_picture` 
                SET `mw_url_picture`= :urlPic, `mw_size_picture`= :sizePic, `mw_position_picture`= :positionPic 
                WHERE `mw_id_picture`= :idPic";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
        $preparePic->bindValue(':sizePic', $dataP->getMwSizePicture(), PDO::PARAM_INT);
        $preparePic->bindValue(':positionPic', $dataP->getMwPositionPicture(), PDO::PARAM_INT);
        $preparePic->bindValue(':idPic', $dataP->getMwIdPicture(), PDO::PARAM_INT);
        $preparePic->execute();


        $sqlHome = "UPDATE `mw_homepage` 
                SET `mw_content_homepage`= :content, `mw_date_homepage`= :date, `mw_picture_mw_id_picture`= :pic
                WHERE `mw_id_homepage`= :id";
        $prepareHome =$this->db->prepare($sqlHome);
        $prepareHome->bindValue(':content', $dataH->getMwContentHomepage(), PDO::PARAM_STR);
        $prepareHome->bindValue(':date', $dataH->getMwDateHomepage(), PDO::PARAM_STR);
        $prepareHome->bindValue(':pic', $dataP->getMwIdPicture(), PDO::PARAM_INT);
        $prepareHome->bindValue(':id', $dataH->getMwIdHomepage(), PDO::PARAM_INT);
        $prepareHome->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        } 

    }
    
    // on va pas en avoir besoin wesh :
    public function getOneById(int $id){}
}
