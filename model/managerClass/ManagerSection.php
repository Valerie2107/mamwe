<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\mappingSection;
use model\interfaceClass\ManagerInterface;
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

        $sql = "SELECT s.* , GROUP_CONCAT(p.mw_id_picture, '|||' , p.mw_url_picture SEPARATOR '---') AS picture 
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

    public function insertSection(string $titlePic, string $urlPic, int $sizePic, int $positionPic, string $titleSect, string $contentSect, int $visibleSect){

        $this->db->beginTransaction();
        
        $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`, `mw_size_picture`, `mw_position_picture`) VALUES (:titlePic,:urlPic,:sizePic,:positionPic)";      
        $preparePic = $this->db->prepare($sqlPic);
        $preparePic->bindParam(':titlePic', $titlePic,PDO::PARAM_STR);
        $preparePic->bindParam(':urlPic', $urlPic,PDO::PARAM_STR);
        $preparePic->bindParam(':sizePic', $sizePic, PDO::PARAM_INT);
        $preparePic->bindParam(':positionPic',$positionPic, PDO::PARAM_INT);

        $preparePic->execute();
         

        $lastId = $this->db->lastInsertId();


        $sqlSect = "INSERT INTO `mw_section`(`mw_title_sect`, `mw_content_sect`, `mw_visible_sect`, `mw_picture_mw_id_picture`) VALUES (:titleSect,:contentSect,:visibleSect, :pictureSect)";      
        $prepareSect = $this->db->prepare($sqlSect);
        $prepareSect->bindParam(':titleSect', $titleSect,PDO::PARAM_STR);
        $prepareSect->bindParam(':contentSect', $contentSect, PDO::PARAM_STR);
        $prepareSect->bindParam(':visibleSect', $visibleSect, PDO::PARAM_INT);
        $prepareSect->bindParam(':pictureSect', $lastId, PDO::PARAM_INT);
        
        $prepareSect->execute();
       
        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            $e -> getMessage();
        }
    }

    public function update(){ 

    }

    public function delete(){

    }

}