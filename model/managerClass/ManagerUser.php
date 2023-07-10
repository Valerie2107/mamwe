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
    
    public static function disconnect() : void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

    public function connect(MappingUser $user) : bool
    {
        $query   = "SELECT mw_id_user, mw_login_user, mw_pwd_user
                    FROM mw_user 
                    WHERE mw_login_user = :login";
        $prepare = $this->db->prepare($query);
        $prepare->bindValue(":login", $user->getMwLoginUser(), PDO::PARAM_STR);
        $prepare->execute();
        try {
            $result = $prepare->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e);
        }
        return $result && $this-> userLogin($result, $user->getMwPwdUser());
    }

    private function userLogin($userInfo, $pwd) : bool
    {
        if (password_verify($pwd, $userInfo["mw_pwd_user"])) {
            $_SESSION["idSession"]      = session_id();
            $_SESSION["idUser"]         = $userInfo["mw_id_user"];
            $_SESSION["userLogin"]      = $userInfo["mw_login_user"];
            $result                     = true;
        }
        else {
            $result = false;
        }
        return $result;
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
    
    public function updateUser(MappingUser $data){
        $sql = "UPDATE `mw_user` SET `mw_login_user`= :login, `mw_mail_user`= :mail, `mw_pwd_user`= :pwd 
                WHERE `mw_id_user`= :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindValue(':login', $data->getMwLoginUser(), PDO::PARAM_STR);
        $prepare->bindValue(':mail', $data->getMwMailUser(), PDO::PARAM_STR);
        $prepare->bindValue(':pwd', $this -> hashPwd($data -> getMwPwdUser()) , PDO::PARAM_STR);
        $prepare->bindValue(':id', $data -> getMwIdUser(), PDO::PARAM_INT);
        
        try {
            $prepare -> execute();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        }
    }


    // j'ai fait un insertUser, on est pas sensé en avoir un, mais si jamais il est là :
    // public function insertUser(MappingUser $data){
    //     $sql = "INSERT INTO `mw_user`(`mw_login_user`, `mw_mail_user`, `mw_pwd_user`) VALUES (:login, :mail, :pwd)";
    //     $prepare = $this->db->prepare($sql);
    //     $prepare->bindValue(':login', $data->getMwLoginUser(), PDO::PARAM_STR);
    //     $prepare->bindValue(':mail', $data->getMwMailUser(), PDO::PARAM_STR);
    //     $prepare->bindValue(':pwd', $this -> hashPwd($data -> getMwPwdUser()) , PDO::PARAM_STR);
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