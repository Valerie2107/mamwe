<?php

namespace model\managerClass;

use PDO;
use Exception;
use model\mappingClass\MappingInfo;
use model\interfaceClass\ManagerInterface;


// use ManagerInterface:

class ManagerInfo implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id)
    {
        $sql = "SELECT * FROM mw_info WHERE mw_id_info = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingInfo($result);
        }else{
            throw new Exception("cette information $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT * FROM mw_info";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $info = [];
        foreach ($result as $row){
            $info[] = new MappingInfo($row);               
        }
        return $info;
    }  


    public function insertInfo(MappingInfo $data){

        $sql = "INSERT INTO `mw_info`(`mw_content_info`, `mw_date_info`) 
        VALUES (:content, :date)";  

        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name', $data->getMwContentInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':surname', $data->getMwDateInfo(), PDO::PARAM_STR);
        
        try{
            $prepare->execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
    }


    public function deleteInfo($id){
        $sql = "DELETE FROM mw_info WHERE mw_id_info = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updateInfo(MappingInfo $data){
        $sql = "UPDATE `mw_info` 
                SET `mw_content_info`= :content, `mw_date_info`= :date
                WHERE `mw_id_info`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':content', $data -> getMwContentInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':date', $data -> getMwDateInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':id', $data -> getMwIdInfo(), PDO::PARAM_STR);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}