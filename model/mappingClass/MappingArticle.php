<?php

namespace model\mappingClass;

use DateTime;
use model\abstractClass\MappingAbstract;
use model\traitClass\DateTrait;
use Exception;

class MappingArticle extends MappingAbstract
{
    use DateTrait;

    private int $mwIdArticle;
    private string $mwTitleArt;
    private string $mwContentArt;
    private string $mwDateArt;
    protected int $mwVisibleArt;
    private int $mwSectionMwIdSection;

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
            throw new Exception('ID de l\'article doit être un entier positif');
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

        $this->setMwDateArt(date('d/m/Y'));

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
     */

    public function setMwDateArt(string $mwDateArt): self
    {
        if (!$this->dateTrait($mwDateArt, 'd/m/Y')) {
            throw new Exception('Date incorrecte, format attendu : d/m/Y');
        }

        // Crée un nouvel objet DateTime pour l'heure actuelle
        $now = new DateTime();

        // Met à jour mwDateArt avec la date et l'heure actuelles, au format d/m/Y
        $this->mwDateArt = 'modifié le : ' . $now->format('d/m/Y');

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
}