<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\MappingPicture;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerPicture implements ManagerInterface 
{

    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id){
        $sql = "SELECT * FROM mw_picture WHERE mw_id_picture = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();

        if($result){
            return new MappingPicture($result);
        }else{
            throw new Exception("cette photo $id n'existe pas" );
        }

    }


    public function getAll(){
        $sql = "SELECT * FROM mw_picture";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $sections = [];
        foreach ($result as $row){
            $sections[] = new MappingPicture($row);           

        }
        return $sections;
    } 

    public function getAllByArticleId(int $id) {
        $sql = "SELECT * FROM mw_picture WHERE mw_article_mw_id_article = :id";
        $prepare = $this->db->prepare($sql);
        $prepare -> bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $sections = [];
        foreach ($result as $row){
            $sections[] = new MappingPicture($row);           
        }
        return $sections;
    }


    public function insertPicture(MappingPicture $data){
        $sql = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_article_mw_id_article`) 
                    VALUES (:title, :url, :size, :position, :articleId)";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':title', $data->getMwTitlePicture(), PDO::PARAM_STR);
        $prepare->bindValue(':url', $data->getMwUrlPicture(), PDO::PARAM_STR);
        $prepare->bindValue(':articleId', $data->getMwArticleMwIdArticle(), PDO::PARAM_INT);

        
        try {
            $prepare->execute(); 
            return true;
        }catch(Exception $e){
            $e -> getMessage();
            
        }

    }


    public function updatePicture(MappingPicture $data){
        $sql = "UPDATE `mw_picture` 
                SET `mw_title_picture`= :title, `mw_url_picture`= :url, `mw_article_mw_id_article`= :articleId 
                WHERE `mw_id_picture`=:id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':title', $data->getMwTitlePicture(), PDO::PARAM_STR);
        $prepare->bindValue(':url', $data->getMwUrlPicture(), PDO::PARAM_STR);
        $prepare->bindValue(':articleId', $data->getMwArticleMwIdArticle(), PDO::PARAM_INT);
        $prepare->bindValue(':id',$data->getMwIdPicture(), PDO::PARAM_INT);

        try {
            $prepare->execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
        
    }


    public function deletePicture(int $id){
        $sql = "DELETE FROM `mw_picture` WHERE `mw_id_picture` = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }

    }

    public function deletePictureByArticleId($id){
        $sql = "DELETE FROM `mw_picture` WHERE `mw_article_mw_id_article` = :id";
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