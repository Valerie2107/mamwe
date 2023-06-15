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


    public function getOneById($id){

    }


    public function getAll(){

    }  


    public function insert(){

    }


    public function delete(){

    }


    public function update(){

    }

}