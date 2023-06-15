<?php

namespace model\managerClass;

use Exception;
use model\mappingClass\MappingEx;
use model\interfaceClass\ManagerInterface;
use PDO;


// use ManagerInterface:

class ManagerEX implements ManagerInterface
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


    public function insertEx(){

    }


    public function deleteEx(){

    }


    public function updateEx(){

    }

}