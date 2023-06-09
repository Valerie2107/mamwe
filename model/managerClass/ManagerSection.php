<?php

namespace model\managerClass;

use Exception;
use model\abstractClass\MappingAbstract;
use model\modelClass\Section;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerSection extends MappingAbstract implements ManagerInterface
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
            return new Section($result);
        }else{
            throw new Exception("cette section $id n'existe pas" );
        }

    }

    public function getAll(){
        // préparation de la requête
        $sql = "SELECT * FROM mw_section";
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
        $sections[] = new Section($row);           
    
        // on retourne le tableau
        }
    return $sections;
    }  

}