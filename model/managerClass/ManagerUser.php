<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\MappingUser;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerUser implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    // Crtyptage des mots de passe:
    public function hashPwd(string $pwd): string
    {
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        return $pwd;
    }

    
    public function verifyPwd(string $pwd, string $hash): bool
    {
        $pwd = password_verify($pwd, $hash);
        return $pwd;
    }
    
    
    public function getOneById($id){
        $sql = "SELECT * FROM mw_user WHERE mw_id_user = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingUser($result);
        }else{
            throw new Exception("cette utilisateur $id n'existe pas" );
        }        
    }
    
    public function updateUser(int $id, string $login, string $mail, string $pwd){
        $sql = "UPDATE `mw_user` SET `mw_login_user`= :login, `mw_mail_user`= :mail, `mw_pwd_user`= :pwd 
                WHERE `mw_id_user`= :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':login', $login, PDO::PARAM_STR);
        $prepare->bindParam(':mail', $mail, PDO::PARAM_STR);
        $prepare->bindParam(':pwd', $pwd, PDO::PARAM_STR);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);
        
        try {
            $prepare -> execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
    }


    // j'ai fait un insertUser, on est pas sensé en avoir un, mais si jamais il est là :
    // public function insertUser(string $login, string $mail, string $pwd){
    //     $sql = "INSERT INTO `mw_user`(`mw_login_user`, `mw_mail_user`, `mw_pwd_user`) VALUES (:login, :mail, :pwd)";
    //     $prepare = $this->db->prepare($sql);
    //     $prepare->bindParam(':login', $login, PDO::PARAM_STR);
    //     $prepare->bindParam(':mail', $mail, PDO::PARAM_STR);
    //     $prepare->bindParam(':pwd', $pwd, PDO::PARAM_STR);
    //     try {
    //         $prepare -> execute();
    //         return true;
    //     }catch(Exception $e){
    //         $e -> getMessage();
    //     }

    // }


    // fonction getAll() et delete() pas utile pour le moment : 
    public function getAll(){

    }  

    public function delete(){

    }

}