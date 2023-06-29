<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;


class MappingRessource extends MappingAbstract {

    private int $mwIdRessource;
    private string $mwTitleRessource;
    private string $mwContentRessource;
    private ?string $mwUrlRessource;
    private string $mwDateRessource;
    private int $mwCategory;
    private int $mwSubCategory;
    private ?int $mwPictureMwIdPicture;

    use \model\traitClass\DateTrait; 

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
     * Get the value of mwUrlRessource
     *
     * @return string
     */
    public function getMwUrlRessource(): string
    {
        return $this->mwUrlRessource;
    }

    /**
     * Set the value of mwUrlRessource
     *
     * @param string $mwUrlRessource
     *
     * @return self
     */
    public function setMwUrlRessource(?string $mwUrlRessource): self
    {
        if(!empty($mwUrlRessource)){
            if(strlen($mwUrlRessource) > 255){
                throw new Exception("URL trop longue ! ");
            }else{
                $this->mwUrlRessource = $mwUrlRessource;
            }
        }

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

        if($this-> dateTrait($mwDateRessource, 'Y-m-d')){

            $this-> mwDateRessource = $mwDateRessource;

        }else{

            throw new Exception("Date non valide");
            
        }


        return $this;
    }


    /**
     * Get the value of mwCategory
     *
     * @return int
     */
    public function getMwCategory(): int
    {
        return $this->mwCategory;
    }
    
    /**
     * Set the value of mwCategory
     *
     * @param int $mwCategory
     *
     * @return self
     */
    public function setMwCategory(int $mwCategory): self
    {
        if($mwCategory < 0 ) throw new Exception("La valeur ne peut être négative ! ");
        $this->mwCategory = $mwCategory;
        
        return $this;
    }
    

    /**
     * Get the value of mwSubCategory
     *
     * @return int
     */
    public function getMwSubCategory(): int
    {
        return $this->mwSubCategory;
    }
    
    /**
     * Set the value of mmwSubCategory
     *
     * @param int $mmwSubCategory
     *
     * @return self
     */
    public function setMwSubCategory(int $mwSubCategory): self
    {
        if($mwSubCategory< 0 ) throw new Exception("La valeur ne peut être négative ! ");
        $this->mwSubCategory = $mwSubCategory;
        
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
        if($mwPictureMwIdPicture < 0 ) throw new Exception("La valeur ne peut être négative ! ");
        $this->mwPictureMwIdPicture = $mwPictureMwIdPicture;

        return $this;
    }
}