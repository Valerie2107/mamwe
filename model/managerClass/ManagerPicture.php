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


    public function insertPicture(string $titlePic, string $urlPic, int $sizePic, int $positionPic, int $articleId = null){
        $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`, `mw_article_mw_id_article`) 
                    VALUES (:titlePic, :urlPic, :sizePic, :positionPic, :articleId)";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindParam(':titlePic', $titlePic, PDO::PARAM_STR);
        $preparePic->bindParam(':urlPic', $urlPic, PDO::PARAM_STR);
        $preparePic->bindParam(':sizePic', $sizePic, PDO::PARAM_INT);
        $preparePic->bindParam(':positionPic', $positionPic, PDO::PARAM_INT);
        $preparePic->bindParam(':articleId', $articleId, PDO::PARAM_INT);

        try {
            $result = $preparePic->execute(); 
        }catch(Exception $e){
            $e -> getMessage();
            die;
        }

        if($result){
            return true;
        }else{
            "y'a des problèmes";
        }
    }


    public function updatePicture(){

    }


    public function deletePicture(){

    }

}