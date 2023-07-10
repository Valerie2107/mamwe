<?php

namespace model\managerClass;

use PDO;
use Exception;
use model\mappingClass\MappingLivreDor;
use model\interfaceClass\ManagerInterface;
use DateTime;


// use ManagerInterface:

class ManagerLivreDor implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id)
    {
        $sql = "SELECT * FROM mw_livredor WHERE mw_id_livredor = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingLivreDor($result);
        }else{
            throw new Exception("cette page $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT * FROM mw_livredor";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $livre = [];
        foreach ($result as $row){
            $livre[] = new MappingLivreDor($row);               
        }
        return $livre;
    }  

    public function getAllVisible()
    {
        $sql = "SELECT * FROM mw_livredor WHERE mw_visible_livredor = 1";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $livre = [];
        foreach ($result as $row){
            $livre[] = new MappingLivreDor($row);               
        }
        return $livre;
    } 

    public function insertLivreDor(MappingLivreDor $data){

        $sql = "INSERT INTO `mw_livredor`(`mw_name_livredor`, `mw_mail_livredor`, `mw_message_livredor`, `mw_date_livredor`) 
        VALUES (:name, :mail, :message, :date)";  

        $date =  new DateTime();
        $date = $date -> format("Y-d-m");

        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name', $data->getMwNameLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':mail', $data->getMwMailLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':message', $data->getMwMessageLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':date', $date , PDO::PARAM_STR);
        
        try{
            $prepare->execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
    }


    public function deleteLivreDor($id){
        $sql = "DELETE FROM mw_livredor WHERE mw_id_livredor = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updateLivreDor(MappingLivreDor $data){
        $sql = "UPDATE `mw_livredor` 
                SET `mw_name_livredor`= :name, `mw_mail_livredor`= :mail, `mw_message_livredor`= :message, `mw_date_livredor`= :date,`mw_visible_livredor`= :visibility 
                WHERE `mw_id_livredor`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name', $data -> getMwNameLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':mail', $data -> getMwMailLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':message', $data -> getMwMessageLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':date', $data -> getMwDateLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':visibility', $data -> getMwVisibleLivreDor(), PDO::PARAM_STR);
        $prepare->bindValue(':id', $data -> getMwIdLivreDor(), PDO::PARAM_STR);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}