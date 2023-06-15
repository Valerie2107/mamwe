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


    public function insertPicture(string $title, string $url, int $size, int $position, int $articleId = null){
        $sql = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`, `mw_article_mw_id_article`) 
                    VALUES (:title, :url, :size, :position, :articleId)";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindParam(':title', $title, PDO::PARAM_STR);
        $prepare->bindParam(':url', $url, PDO::PARAM_STR);
        $prepare->bindParam(':size', $size, PDO::PARAM_INT);
        $prepare->bindParam(':position', $position, PDO::PARAM_INT);
        $prepare->bindParam(':articleId', $articleId, PDO::PARAM_INT);

        try {
            $prepare->execute(); 
            return true;
        }catch(Exception $e){
            $e -> getMessage();

        }

    }


    public function updatePicture(string $title, string $url, int $size, int $position, int $id, $articleId = null){
        $sql = "UPDATE `mw_picture` 
                SET `mw_title_picture`= :title, `mw_url_picture`= :url, `mw_size_picture`= :size, `mw_position_picture`= :position, `mw_article_mw_id_article`= :articleId 
                WHERE `mw_id_picture`=:id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindParam(':title', $title,PDO::PARAM_STR);
        $prepare->bindParam(':url', $url,PDO::PARAM_STR);
        $prepare->bindParam(':size', $size, PDO::PARAM_INT);
        $prepare->bindParam(':position',$position, PDO::PARAM_INT);
        $prepare->bindParam(':articleId',$articleId, PDO::PARAM_INT);
        $prepare->bindParam(':id',$id, PDO::PARAM_INT);

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

}