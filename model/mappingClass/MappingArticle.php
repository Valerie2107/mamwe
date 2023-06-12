<?php

namespace model\mappingClass;

use DateTime;
use model\abstractClass\MappingAbstract;
use Exception;

class Article extends MappingAbstract
{
    private int $mwIdArticle;
    private string $mwTitleArt;
    private string $mwContentArt;
    private string $mwDateArt;
    private int $mwIdSection;
    protected int $mwVisibleArt;

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
     */

    public function setMwContentArt(string $mwContentArt): self
    {
        if(strlen($mwContentArt)>5000){
            throw new Exception("Article trop long 5000 caractères maximum");
        }else {
            $this->mwContentArt = $mwContentArt;
        }

        $this->setMwDateArt(date('Y-m-d H:i'));

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
        }/**  elseif ($mwVisibleArt == 0){
            $mwVisibleArt = 1;
            $this->mwVisibleArt = $mwVisibleArt;
        }elseif ($mwVisibleArt == 1) {
            $mwVisibleArt = 0;
            $this->mwVisibleArt = $mwVisibleArt;
        }
     * */
        // Inverse la valeur de mwVisibleArt (0 devient 1 et 1 devient 0)
        $this->mwVisibleArt = $mwVisibleArt ^ 1;

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
        // Crée un nouvel objet DateTime pour l'heure actuelle
        $now = new DateTime();

        // Met à jour mwDateArt avec la date et l'heure actuelles, formatées en tant que chaîne
        $this->mwDateArt = 'modifié le : ' . $now->format('Y-m-d H:i');

        return $this;
    }

    /**
     * @return int
     */
    public function getMwSectionMwIdSection(): int
    {
        return $this->mwIdSection;
    }

    /**
     * @param int $mwIdSection
     *
     * @return self
     */

    public function setMwSectionMwIdSection(int $mwIdSection): self
    {
        // Vérifier que l'id de la section est bien un entier
        if(!is_int($mwIdSection)){
            throw new Exception("L'id de la section doit être un entier");
        }
        // Vérifier que l'id de la section est bien supérieur à 0
        if($mwIdSection <= 0){
            throw new Exception("L'id de la section doit être supérieur à 0");
        }
        // Vérifier que l'id de la section est compris entre 1 et 3
        if($mwIdSection < 1 || $mwIdSection > 3){
            throw new Exception("L'id de la section doit être compris entre 1 et 3");
        }

        $this->mwIdSection = $mwIdSection;

        return $this;
    }
}