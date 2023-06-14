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
        JOIN mw_picture p ON p.mw_id_picture = s.mw_picture_mw_id_picture
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

}