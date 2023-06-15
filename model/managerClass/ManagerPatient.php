<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\MappingPatient;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerPatient implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id)
    {
        $sql = "SELECT * FROM mw_patient WHERE mw_id_patient = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingPatient($result);
        }else{
            throw new Exception("cette patient $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT * FROM mw_patient";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $patients = [];
        foreach ($result as $row){
            $patients[] = new MappingPatient($row);               
        }
        return $patients;
    }  


    public function insertPatient($name, $surname, $birthdate, $mail, $phone){
        $sql = "INSERT INTO `mw_patient`(`mw_name_patient`, `mw_surname_patient`, `mw_birthdate_patient`, `mw_mail_patient`, `mw_phone_patient`) 
        VALUES (:name, :surname, :birthdate, :mail, :phone)";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindParam(':name', $name,PDO::PARAM_STR);
        $prepare->bindParam(':surname', $surname, PDO::PARAM_STR);
        $prepare->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $prepare->bindParam(':mail', $mail, PDO::PARAM_STR);
        $prepare->bindParam(':phone', $phone, PDO::PARAM_INT);
        
        try{
            $prepare->execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
    }


    public function deletePatient($id){
        $sql = "DELETE FROM mw_patient WHERE mw_id_patient = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updatePatient($name, $surname, $birthdate, $mail, $phone, $id){
        $sql = "UPDATE `mw_patient` 
                SET `mw_name_patient`= :name, `mw_surname_patient`= :surname, `mw_birthdate_patient`= :birthdate, `mw_mail_patient`= :mail,`mw_phone_patient`= :phone 
                WHERE `mw_id_patient`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindParam(':name', $name,PDO::PARAM_STR);
        $prepare->bindParam(':surname', $surname, PDO::PARAM_STR);
        $prepare->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
        $prepare->bindParam(':mail', $mail, PDO::PARAM_STR);
        $prepare->bindParam(':phone', $phone, PDO::PARAM_STR);
        $prepare->bindParam(':id', $id, PDO::PARAM_STR);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}