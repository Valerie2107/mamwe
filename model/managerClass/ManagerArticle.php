<?php

namespace model\managerClass;

use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingArticle;
use model\mappingClass\MappingPicture;
use Exception;
use PDO;

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
        // requête sql + prepare + bindValue + execute + etc
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


    public function getAll()
    {
        // requête sql + prepare + bindValue + execute + etc
        $sql = "SELECT * FROM mw_article";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $articles = [];
        foreach ($result as $row) {
            $articles[] = new MappingArticle($row);
        }
        return $articles;
    }

    /*
        public function getArticleById($db, $id){
            $sql = "SELECT a.mw_id_article, a.mw_title_art, a.mw_content_art, a.mw_visible_art, a.mw_date_art, a.mw_section_mw_id_section, GROUP_CONCAT(s.mw_title_sect) as mw_title_sect, GROUP_CONCAT(s.mw_id_sect) as mw_id_sect FROM mw_article a JOIN mw_section s ON a.mw_section_mw_id_section = s.mw_id_sect WHERE a.mw_id_article = :id";
            $prepare = $this->db->prepare($sql);
            $prepare->bindValue(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            $result = $prepare->fetchAll();
            $articles = [];
            foreach ($result as $row){
                $articles[] = new MappingArticle($row);
            }
            return $articles;
        }

        public function getPictureByArticleId($db, $id){
            $sql = "SELECT p.mw_id_picture, p.mw_url_picture, p.mw_article_mw_id_article, a.mw_id_article FROM mw_picture p JOIN mw_article a ON p.mw_article_mw_id_article = a.mw_id_article WHERE p.mw_article_mw_id_article = :id";
            $prepare = $this->db->prepare($sql);
            $prepare->bindValue(':id', $id, PDO::PARAM_INT);
            $prepare->execute();
            $result = $prepare->fetchAll();
            $pictures = [];
            foreach ($result as $row){
                $pictures[] = new MappingArticle($row);
            }
            return $pictures;
        }
    */
    public function getAllArticlesWithPictures($section_id)
    {
        $sql = "SELECT a.*, GROUP_CONCAT(p.mw_id_picture, '|||' , p.mw_url_picture SEPARATOR '---') AS picture
            FROM mw_article a 
            LEFT JOIN mw_picture p ON p.mw_article_mw_id_article = a.mw_id_article
            WHERE a.mw_section_mw_id_section = :section_id
            GROUP BY a.mw_id_article";

        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':section_id', $section_id, PDO::PARAM_INT);
        $prepare->execute();

        $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
        $articles = [];
        foreach ($result as $row) {
            $articles[] = new MappingArticle($row);
        }
        return $articles;
    }



    public function insertArticle(MappingArticle $article, $pictures = null)
    {
        // requête sql + prepare + bindValue + execute + etc
        $sql = "INSERT INTO mw_article (mw_title_art, mw_content_art, mw_visible_art, mw_section_mw_id_section) VALUES (:mw_title_art, :mw_content_art,  :mw_visible_art, :mw_section_mw_id_section)";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':mw_title_art', $article->getMwTitleArt(), PDO::PARAM_STR);
        $prepare->bindValue(':mw_content_art', $article->getMwContentArt(), PDO::PARAM_STR);
        $prepare->bindValue(':mw_visible_art', $article->getMwVisibleArt(), PDO::PARAM_INT);
        $prepare->bindValue(':mw_section_mw_id_section', $article->getMwSectionMwIdSection(), PDO::PARAM_INT);

        // transaction
        $this->db->beginTransaction();

        try {
            $prepare->execute();
            $lastArticleId = $this->db->lastInsertId();
            $article->setMwIdArticle($lastArticleId);
        if($pictures != null){
            // boucle sur les images
            foreach ($pictures as $picture) {
                // requête sql + prepare + bindValue + execute pour insert des photos
                $picsql = "INSERT INTO mw_picture (mw_title_picture, mw_url_picture, mw_size_picture, mw_position_picture, mw_article_mw_id_article) VALUES (:mw_title_picture, :mw_url_picture, :mw_size_picture, :mw_position_picture, :mw_article_mw_id_article)";
                $picPrepare = $this->db->prepare($picsql);
                $picPrepare->bindValue(':mw_title_picture', $picture->getMwTitlePicture(), PDO::PARAM_STR);
                $picPrepare->bindValue(':mw_url_picture', $picture->getMwUrlPicture(), PDO::PARAM_STR);
                $picPrepare->bindValue(':mw_size_picture', $picture->getMwSizePicture(), PDO::PARAM_INT);
                $picPrepare->bindValue(':mw_position_picture', $picture->getMwPositionPicture(), PDO::PARAM_INT);
                $picPrepare->bindValue(':mw_article_mw_id_article', $lastArticleId, PDO::PARAM_INT);
                $picPrepare->execute();
            }
        }

            // commit transaction
            $this->db->commit();

            return $article;

        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }



    public function deleteArticle(MappingArticle $article, $id){
        $sql = "DELETE FROM mw_article WHERE mw_id_article = :id";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();

        $article->setMwIdArticle($this->db->lastInsertId());
        return $article;
    }


    public function updateArticleWithPic(MappingArticle $article, MappingPicture $picture)
    {
        $this->db->beginTransaction();

        try {
            $sql = "UPDATE mw_article SET mw_title_art = :title, mw_content_art = :content, mw_visible_art = :visible, mw_section_mw_id_section = :mw_section_mw_id_section WHERE mw_id_article = :id";
            $prepare = $this->db->prepare($sql);
            $prepare->bindValue(':title', $article->getMwTitleArt(), PDO::PARAM_STR);
            $prepare->bindValue(':content', $article->getMwContentArt(), PDO::PARAM_STR);
            $prepare->bindValue(':visible', $article->getMwVisibleArt(), PDO::PARAM_INT);
            $prepare->bindValue(':mw_section_mw_id_section', $article->getMwSectionMwIdSection(), PDO::PARAM_INT);
            $prepare->bindValue(':id', $article->getMwIdArticle(), PDO::PARAM_INT);
            $prepare->execute();

            $picsql = "UPDATE mw_picture SET mw_title_picture = :title, mw_url_picture = :url, mw_size_picture = :size, mw_position_picture = :position, mw_article_mw_id_article = :mw_article_mw_id_article WHERE mw_id_picture = :id";
            $picPrepare = $this->db->prepare($picsql);
            $picPrepare->bindValue(':title', $picture->getMwTitlePicture(), PDO::PARAM_STR);
            $picPrepare->bindValue(':url', $picture->getMwUrlPicture(), PDO::PARAM_STR);
            $picPrepare->bindValue(':size', $picture->getMwSizePicture(), PDO::PARAM_INT);
            $picPrepare->bindValue(':position', $picture->getMwPositionPicture(), PDO::PARAM_INT);
            $picPrepare->bindValue(':mw_article_mw_id_article', $article->getMwIdArticle(), PDO::PARAM_INT);
            $picPrepare->bindValue(':id', $picture->getMwIdPicture(), PDO::PARAM_INT);
            $picPrepare->execute();

            $this->db->commit();

            return $article;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}