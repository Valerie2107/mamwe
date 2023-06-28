<?php

namespace model\managerClass;

use PDO;
use Exception;
use model\mappingClass\MappingAgenda;
use model\interfaceClass\ManagerInterface;


// use ManagerInterface:

class ManagerAgenda implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id)
    {
        $sql = "SELECT * FROM mw_agenda WHERE mw_id_agenda = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingAgenda($result);
        }else{
            throw new Exception("cet événement $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT * FROM mw_agenda";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $date = [];
        foreach ($result as $row){
            $date[] = new MappingAgenda($row);               
        }
        return $date;
    }  


    public function insertAgenda(MappingAgenda $data){

        $sql = "INSERT INTO `mw_agenda`(`mw_date_agenda`, `mw_content_agenda`, `mw_title_agenda`) 
        VALUES (:date, :content, :title)";  

        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':date', $data->getMwDateAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':content', $data->getMwContentAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':title', $data->getMwTitleAgenda(), PDO::PARAM_STR);
        
        try{
            $prepare->execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
    }


    public function deleteAgenda($id){
        $sql = "DELETE FROM mw_agenda WHERE mw_id_agenda = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updatePatient(MappingAgenda $data){
        $sql = "UPDATE `mw_agenda` 
                SET `mw_date_agenda`= :date, `mw_content_agenda`= :content, `mw_title_agenda`= :title
                WHERE `mw_id_agenda`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':date', $data -> getMwDateAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':content', $data -> getMwContentAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':title', $data -> getMwTitleAgenda(), PDO::PARAM_STR);
        $prepare->bindValue(':id', $data -> getMwIdAgenda(), PDO::PARAM_STR);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}