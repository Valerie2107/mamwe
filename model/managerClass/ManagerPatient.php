<?php

namespace model\managerClass;

use PDO;
use Exception;
use model\mappingClass\MappingPatient;
use model\interfaceClass\ManagerInterface;


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


    public function insertPatient(MappingPatient $data){

        $sql = "INSERT INTO `mw_patient`(`mw_name_patient`, `mw_surname_patient`, `mw_birthdate_patient`, `mw_mail_patient`, `mw_phone_patient`) 
        VALUES (:name, :surname, :birthdate, :mail, :phone)";  

        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name', $data->getMwNamePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':surname', $data->getMwSurnamePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':birthdate', $data->getMwBirthdatePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':mail', $data->getMwMailPatient(), PDO::PARAM_STR);
        $prepare->bindValue(':phone', $data->getMwPhonePatient(), PDO::PARAM_INT);
        
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


    public function updatePatient(MappingPatient $data){
        $sql = "UPDATE `mw_patient` 
                SET `mw_name_patient`= :name, `mw_surname_patient`= :surname, `mw_birthdate_patient`= :birthdate, `mw_mail_patient`= :mail,`mw_phone_patient`= :phone 
                WHERE `mw_id_patient`= :id";      
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name', $data -> getMwNamePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':surname', $data -> getMwSurnamePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':birthdate', $data -> getMwBirthdatePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':mail', $data -> getMwMailPatient(), PDO::PARAM_STR);
        $prepare->bindValue(':phone', $data -> getMwPhonePatient(), PDO::PARAM_STR);
        $prepare->bindValue(':id', $data -> getMwIdPatient(), PDO::PARAM_STR);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}