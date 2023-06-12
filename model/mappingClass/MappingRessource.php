<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;
use DateTime;

class MappingRessource extends MappingAbstract {

    private int $mwIdRessource;
    private string $mwTitleRessource;
    private string $mwContentRessource;
    private string $mwDateRessource;
    private ?int $mwPictureMwIdPicture;
    private ?int $mwCategoryRessourceMwCategoryId;

    
    

    /**
     * Get the value of mwIdRessource
     *
     * @return int
     */
    public function getMwIdRessource(): int
    {
        return $this->mwIdRessource;
    }

    /**
     * Set the value of mwIdRessource
     *
     * @param int $mwIdRessource
     *
     * @return self
     */
    public function setMwIdRessource(int $mwIdRessource): self
    {

        if($mwIdRessource < 0 ){
            throw new Exception("Pas de valeurs négatives admise ! ");        
        }else {
            $this->mwIdRessource = $mwIdRessource;
        }

        return $this;
    }

    /**
     * Get the value of mwTitleRessource
     *
     * @return string
     */
    public function getMwTitleRessource(): string
    {
        return $this->mwTitleRessource;
    }

    /**
     * Set the value of mwTitleRessource
     *
     * @param string $mwTitleRessource
     *
     * @return self
     */
    public function setMwTitleRessource(string $mwTitleRessource): self
    {
        if(strlen($mwTitleRessource) > 255){
            throw new Exception("Titre trop long ! ");
        }else{
            $this->mwTitleRessource = $mwTitleRessource;
        }

        return $this;
    }

    /**
     * Get the value of mwContentRessource
     *
     * @return string
     */
    public function getMwContentRessource(): string
    {
        return $this->mwContentRessource;
    }

    /**
     * Set the value of mwContentRessource
     *
     * @param string $mwContentRessource
     *
     * @return self
     */
    public function setMwContentRessource(string $mwContentRessource): self
    {
        $this->mwContentRessource = $mwContentRessource;

        return $this;
    }

    /**
     * Get the value of mwDateRessource
     *
     * @return string
     */
    public function getMwDateRessource(): string
    {
        return $this->mwDateRessource;
    }

    /**
     * Set the value of mwDateRessource
     *
     * @param string $mwDateRessource
     *
     * @return self
     */
    public function setMwDateRessource(string $mwDateRessource): self
    {
        function validateDate($date, $format = 'd/m/Y'){
            
            $d = DateTime::createFromFormat($format, $date);
            return $d && $d->format($format) == $date;
        }

        if(validateDate($mwDateRessource)){

            $this->mwDateRessource = $mwDateRessource;
        }else{
            throw new Exception("Date non valide");
        }


        return $this;
    }

    /**
     * Get the value of mwPictureMwIdPicture
     *
     * @return ?int
     */
    public function getMwPictureMwIdPicture(): ?int
    {
        return $this->mwPictureMwIdPicture;
    }

    /**
     * Set the value of mwPictureMwIdPicture
     *
     * @param ?int $mwPictureMwIdPicture
     *
     * @return self
     */
    public function setMwPictureMwIdPicture(?int $mwPictureMwIdPicture): self
    {
        $this->mwPictureMwIdPicture = $mwPictureMwIdPicture;

        return $this;
    }

    /**
     * Get the value of mwCategoryRessourceMwCategoryId
     *
     * @return ?int
     */
    public function getMwCategoryRessourceMwCategoryId(): ?int
    {
        return $this->mwCategoryRessourceMwCategoryId;
    }

    /**
     * Set the value of mwCategoryRessourceMwCategoryId
     *
     * @param ?int $mwCategoryRessourceMwCategoryId
     *
     * @return self
     */
    public function setMwCategoryRessourceMwCategoryId(?int $mwCategoryRessourceMwCategoryId): self
    {
        $this->mwCategoryRessourceMwCategoryId = $mwCategoryRessourceMwCategoryId;

        return $this;
    }
}