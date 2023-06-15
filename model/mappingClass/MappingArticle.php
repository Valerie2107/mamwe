<?php

namespace model\mappingClass;

use DateTime;
use model\abstractClass\MappingAbstract;
use model\traitClass\DateTrait;
use Exception;

class MappingArticle extends MappingAbstract
{
    use DateTrait;

    //Table mw_article
    private int $mwIdArticle;
    private string $mwTitleArt;
    private string $mwContentArt;
    private string $mwDateArt;
    protected int $mwVisibleArt;
    private int $mwSectionMwIdSection;

    //Table mw_picture
    private int $mwIdPicture;
    private string $mwTitlePicture;
    private string $mwUrlPicture;
    private int $mwTaillePicture;
    private int $mwPositionPicture;
    private int $mwArticleMwIdArticle;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    /**
     * Get the value of mwIdArticle
     *
     * @return int
     */
    public function getMwIdArticle(): int
    {
        return $this->mwIdArticle;
    }

    /**
     * Set the value of mwIdArticle
     *
     * @param int $mwIdArticle
     *
     * @return self
     */
    public function setMwIdArticle(int $mwIdArticle): self
    {
        if ($mwIdArticle <= 0) {
            throw new Exception("L'id de l'article doit être un entier positif");
        }
        $this->mwIdArticle = $mwIdArticle;

        return $this;
    }

    /**
     * Get the value of mwTitleArt
     *
     * @return string
     */
    public function getMwTitleArt(): string
    {
        return $this->mwTitleArt;
    }

    /**
     * Set the value of mwTitleArt
     *
     * @param string $mwTitleArt
     *
     * @return self
     */
    public function setMwTitleArt(string $mwTitleArt): self
    {
        if(strlen($mwTitleArt)>100){
            throw new Exception("Titre trop long 100 caractères maximum");
        }else {
            $this->mwTitleArt = $mwTitleArt;
        }

        return $this;
    }

    /**
     * Get the value of mwContentArt
     *
     * @return string
     */

    public function getMwContentArt(): string
    {
        return $this->mwContentArt;
    }

    /**
     * Set the value of mwContentArt
     *
     * @param string $mwContentArt
     *
     * @return self
     * @throws Exception
     */

    public function setMwContentArt(string $mwContentArt): self
    {
        if(strlen($mwContentArt)>5000){
            throw new Exception("Article trop long 5000 caractères maximum");
        }else {
            $this->mwContentArt = $mwContentArt;
        }


        return $this;
    }

    /**
     *
     * @return int
     */
    public function getMwVisibleArt(): int
    {
        return $this->mwVisibleArt;
    }

    /**
     *
     * @param int $mwVisibleArt
     *
     * @return self
     */
    public function setMwVisibleArt(int $mwVisibleArt): self
    {
        if($mwVisibleArt != 0 && $mwVisibleArt != 1){
            throw new Exception("Valeur de visibilité incorrecte 0 ou 1 uniquement");
        }

        $this->mwVisibleArt = $mwVisibleArt;

        return $this;
    }

    /**
     * @return string
     */
    public function getMwDateArt(): string
    {
        return $this->mwDateArt;
    }

    /**
     * @param string $mwDateArt
     *
     * @return self
     * @throws Exception
     */

    public function setMwDateArt(string $mwDateArt): self
    {
        if (!$this->dateTrait($mwDateArt, 'Y-m-d')) {
            throw new Exception('Date incorrecte, format attendu : Y/m/d');
        }

        // Crée un nouvel objet DateTime pour l'heure actuelle
        $now = new DateTime();

        // Met à jour mwDateArt avec la date et l'heure actuelles, au format Y-m-d
        $this->mwDateArt = 'modifié le : ' . $now->format('Y-m-d');

        return $this;
    }


    /**
     * @return int
     */
    public function getMwSectionMwIdSection(): int
    {
        return $this->mwSectionMwIdSection;
    }

    /**
     * @param int $mwSectionMwIdSection
     *
     * @return self
     */

    public function setMwSectionMwIdSection(int $mwSectionMwIdSection): self
    {
        // Vérifier que l'id de la section est bien un entier
        if(!is_int($mwSectionMwIdSection)){
            throw new Exception("L'id de la section doit être un entier");
        }
        // Vérifier que l'id de la section est bien supérieur à 0
        if($mwSectionMwIdSection <= 0){
            throw new Exception("L'id de la section doit être supérieur à 0");
        }
        // Vérifier que l'id de la section est un entier positif
        /* if($mwSectionMwIdSection < 1 || $mwSectionMwIdSection > 3){
            throw new Exception("L'id de la section doit être compris entre 1 et 3");
        }
        */

        $this->mwSectionMwIdSection = $mwSectionMwIdSection;

        return $this;
    }

    /**
     * Get the value of mwIdPicture
     *
     * @return int
     */
    public function getMwIdPicture(): int
    {
        return $this->mwIdPicture;
    }

    /**
     * Set the value of mwIdPicture
     *
     * @param int $mwIdPicture
     *
     * @return self
     */
    public function setMwIdPicture(int $mwIdPicture): self
    {
        if ($mwIdPicture <= 0) {
            throw new Exception("L'id de l'image doit être un entier positif");
        }
        $this->mwIdPicture = $mwIdPicture;

        return $this;
    }

    /**
     * Get the value of mwTitlePicture
     *
     * @return string
     */
    public function getMwTitlePicture(): string
    {
        return $this->mwTitlePicture;
    }

    /**
     * Set the value of mwTitlePicture
     *
     * @param string $mwTitlePicture
     *
     * @return self
     */
    public function setMwTitlePicture(string $mwTitlePicture): self
    {
        if(strlen($mwTitlePicture)>100){
            throw new Exception("Titre trop long 100 caractères maximum");
        }else {
            $this->mwTitlePicture = $mwTitlePicture;
        }

        return $this;
    }

    /**
     * Get the value of mwUrlPicture
     *
     * @return string
     */
    public function getMwUrlPicture(): string
    {
        return $this->mwUrlPicture;
    }

    /**
     * Set the value of mwAltPicture
     *
     * @param string $mwUrlPicture
     *
     * @return self
     */
    public function setMwUrlPicture(string $mwUrlPicture): self
    {
        if(strlen($mwUrlPicture)>1000){
            throw new Exception("Titre trop long 1000 caractères maximum");
        }else {
            $this->mwUrlPicture = $mwUrlPicture;
        }

        return $this;
    }

    /**
     * Get the value of mwTaillePicture
     *
     * @return int
     */
    public function getMwTaillePicture(): int
    {
        return $this->mwTaillePicture;
    }

    /**
     * Set the value of mwTaillePicture
     *
     * @param int $mwTaillePicture
     *
     * @return self
     */
    public function setMwTaillePicture(int $mwTaillePicture): self
    {
        if ($mwTaillePicture <= 0) {
            throw new Exception("La taille de l'image doit être un entier positif");
        }
        $this->mwTaillePicture = $mwTaillePicture;

        return $this;
    }

    /**
     * Get the value of mwPositionPicture
     *
     * @return int
     */
    public function getMwPositionPicture(): int
    {
        return $this->mwPositionPicture;
    }

    /**
     * Set the value of mwPositionPicture
     *
     * @param int $mwPositionPicture
     *
     * @return self
     */
    public function setMwPositionPicture(int $mwPositionPicture): self
    {
        if ($mwPositionPicture <= 0) {
            throw new Exception("La position de l'image doit être un entier positif");
        }
        $this->mwPositionPicture = $mwPositionPicture;

        return $this;
    }

    /**
     * @return int
     */
    public function getMwArticleMwIdArticle(): int
    {
        return $this->mwArticleMwIdArticle;
    }

    /**
     * @param int $mwArticleMwIdArticle
     *
     * @return self
     */
    public function setMwArticleMwIdArticle(int $mwArticleMwIdArticle): self
    {
        if ($mwArticleMwIdArticle <= 0) {
            throw new Exception("L'id de l'article doit être un entier positif");
        }
        $this->mwArticleMwIdArticle = $mwArticleMwIdArticle;

        return $this;
    }

    public function getPictures() {
        return $this->pictures;
    }

    public function setPicture($picture) {
        $this->pictures[] = $picture;
    }

}