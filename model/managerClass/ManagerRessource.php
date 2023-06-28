<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\MappingRessource;
use model\mappingClass\MappingCategoryRessource;
use model\mappingClass\MappingSubCategoryRessource;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerRessource implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this -> db = $db;
    }


    public function getOneById($id){
        $prepare = $this->db->prepare("SELECT * FROM mw_ressource WHERE mw_id_ressource = :id");
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetch();
        if ($result) {
            return new MappingRessource($result);
        } else {
            throw new Exception("La ressource $id n'existe pas");
        }
    }



    public function getAll(){
        $prepare = $this->db->prepare("SELECT * FROM `mw_ressource`");
        $prepare->execute();
        $result = $prepare->fetchAll();
        $ressources = [];
        foreach ($result as $row) {
            $ressources[] = new MappingRessource($row);
        }
            
        return $ressources;

    }


    public function getAllCateg(){
        $prepare = $this->db->prepare("SELECT * FROM `mw_category_ressource`");
        $prepare->execute();
        $result = $prepare->fetchAll();
        $categories = [];
        foreach ($result as $row) {
            $categories[] = new MappingCategoryRessource($row);
        }
            
        return $categories;

    }

    public function getAllSubCateg(){
        $prepare = $this->db->prepare("SELECT * FROM `mw_sub_category_ressource`");
        $prepare->execute();
        $result = $prepare->fetchAll();
        $subs = [];
        foreach ($result as $row) {
            $subs[] = new MappingSubCategoryRessource($row);
        }
            
        return $subs;

    }

    public function getAllbyAll($idCateg){
        $prepare = $this->db->prepare("SELECT * FROM `mw_ressource` WHERE mw_category = :idCateg ORDER BY mw_sub_category");
        $prepare->bindValue(':idCateg', $idCateg, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $ressources = [];
        foreach ($result as $row) {
            $ressources[] = new MappingRessource($row);
        }
            
        return $ressources;
    }


    // public function insertRessource(){
    //     $sql = "INSERT INTO mw_ressource (mw_title_ressource,mw_content_ressource, mw_url_ressource, mw_picture_mw_id_picture, mw_category_ressource_mw_category_id ) VALUES (:mw_title_ressource, :mw_content_ressource, :mw_url_ressource, :mw_picture_mw_id_picture, :mw_category_ressource_mw_category_id)";
    //     $prepare = $this->db->prepare($sql);
    //     $prepare->bindValue(':mw_title_ressource', $this->mw_title_ressource, PDO::PARAM_STR);
    //     $prepare->bindValue(':mw_content_ressource', $this->mw_content_ressource, PDO::PARAM_STR);
    //     $prepare->bindValue(':mw_url_ressource', $this->mw_url_ressource, PDO::PARAM_STR);
    //     $prepare->bindValue(':mw_picture_mw_id_picture', $this->mw_picture_mw_id_picture, PDO::PARAM_INT);
    //     $prepare->bindValue(':mw_category_ressource_mw_category_id', $this->mw_category_ressource_mw_category_id, PDO::PARAM_INT);
    //     $prepare->execute();
    //     $this->mw_id_ressource = $this->db->lastInsertId();
    //     return $this;

    // }


    // public function deleteRessource($ressource, $id){
    //     $sql = "DELETE FROM mw_ressource WHERE mw_id_ressource = :id";
    //     $prepare = $this->db->prepare($sql);
    //     $prepare->bindValue(':id', $this->mw_id_ressource, PDO::PARAM_INT);
    //     $prepare->execute();
    //     $ressource -> setMwIdRessource($this->db->lastInsertId());
    //     return $ressource;
    // }


    // public function updateRessource($ressource, $id){
    //     $sql = "UPDATE mw_ressource SET mw_title_ressource = :mw_title_ressource, mw_content_ressource = :mw_content_ressource, mw_url_ressource = :mw_url_ressource, mw_picture_mw_id_picture = :mw_picture_mw_id_picture, mw_category_ressource_mw_category_id = :mw_category_ressource_mw_category_id WHERE mw_id_ressource = :id";
    //     $prepare = $this->db->prepare($sql);
    //     $prepare->bindValue(':mw_title_ressource', $this->mw_title_ressource, PDO::PARAM_STR);
    //     $prepare->bindValue(':mw_content_ressource', $this->mw_content_ressource, PDO::PARAM_STR);
    //     $prepare->bindValue(':mw_url_ressource', $this->mw_url_ressource, PDO::PARAM_STR);
    //     $prepare->bindValue(':mw_picture_mw_id_picture', $this->mw_picture_mw_id_picture, PDO::PARAM_INT);
    //     $prepare->bindValue(':mw_category_ressource_mw_category_id', $this->mw_category_ressource_mw_category_id, PDO::PARAM_INT);
    //     $prepare->bindValue(':id', $this->mw_id_ressource, PDO::PARAM_INT);
    //     $prepare->execute();
    //     $ressource -> setMwIdRessource($this->db->lastInsertId());
    //     return $ressource;
    // }

}