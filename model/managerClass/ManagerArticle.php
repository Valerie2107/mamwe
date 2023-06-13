<?php

namespace model\managerClass;
use PDO;
use model\interfaceClass\ManagerInterface;
use model\modelClass\Article;
use model\abstractClass\MappingAbstract;
use Exception;
use model\mappingClass\MappingArticle;

// use ManagerInterface:

class ManagerArticle  implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getOneById(int $id)
    {
        // requête sql + prepare + bindValue + execute + jointure table mw_picture ¨SOOON"+ etc
        $prepare = $this->db->prepare("SELECT * FROM mw_article WHERE mw_id_article = :id");
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);

        // si on a un résultat, on hydrate un objet Article et on le retourne
        $prepare->execute();
            $result = $prepare->fetch();
            if ($result) {
                return new MappingArticle($result);
            } else {
                throw new Exception("L'article $id n'existe pas");
            }
        }



    public function getAll(){
        // requête sql + prepare + bindValue + execute + etc
        $sql = "SELECT * FROM mw_article";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $articles = [];
        foreach ($result as $row){
            $articles[] = new MappingArticle($row);
        }
        return $articles;
    }
}