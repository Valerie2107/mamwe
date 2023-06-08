<?php

namespace model\interfaceClass; 
use PDO;


// use ManagerInterface:

class ManagerArticle extends ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }

    public function getOneById($id){
        // requête sql + prepare + bindValue + execute + etc
    }

    public function getAll(){
        // requête sql + prepare + bindValue + execute + etc
    }
}