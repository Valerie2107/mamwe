<?php

namespace model\managerClass;

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
        
    }

    public function getAll(){
        // préparation de la requête
        $sql = "SELECT * FROM mw_section";
        $stmt = $this->db->prepare($sql);
        // exécution de la requête
        $stmt->execute();
        // récupération du résultat
        $result = $stmt->fetchAll();
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