<?php

namespace model\mappingClass;

use DateTime;
use model\abstractClass\MappingAbstract;
use model\traitClass\DateTrait;
use Exception;

class MappingAgenda extends MappingAbstract
{
    use DateTrait;

    private int $mwIdAgenda;
    private string $mwDateAgenda;
    private string $mwContentAgenda;
    private string $mwTitleAgenda;
    private ?int $mwPictureMwIdPicture;
    private ?string $picture;
    

    //  get-set mwIdAgenda
    public function getMwIdAgenda(){

        return $this->mwIdAgenda;
    }

    public function setMwIdAgenda(int $mwIdAgenda):self
    {   
        $this->mwIdAgenda = $mwIdAgenda;

        return $this;
    }

    //  get-set mwDateAgenda
    public function getMwDateAgenda(): string 
    {

        return $this->mwDateAgenda;
    }

    /**
     * @param string $mwDateAgenda
     *
     * @return self
     * @throws Exception
     */


    public function setMwDateAgenda(string $mwDateAgenda):self
    {   
        if (!$this->DateTrait($mwDateAgenda, 'Y-m-d')) {
            throw new Exception('Date incorrecte, format attendu : Y/m/d');
        }

        $now = new DateTime();

 
        $this->mwDateAgenda = 'modifié le : ' . $now->format('Y-m-d');

        return $this;
    }

    //  get-set mwContentAgenda
    public function getMwContentAgenda(){

        return $this->mwContentAgenda;
    }

    public function setMwContentAgenda(string $mwContentAgenda):self
    {
        $this->mwContentAgenda = $mwContentAgenda;

        return $this;

    }

    //  get-set mwTitleAgenda
    public function getMwTitleAgenda(){

        return $this->mwTitleAgenda;
    }

    public function setMwTitleAgenda(string $mwTitleAgenda):self
    {
    $this->mwTitleAgenda = $mwTitleAgenda;

    return $this;
    }

    // get-set mwPictureMwIdPicture
    public function getMwPictureMwIdPicture(){

    return $this->mwPictureMwIdPicture;
    }

    public function setMwPictureMwIdPicture(?int $mwPictureMwIdPicture):self
    {
    $this->mwPictureMwIdPicture = $mwPictureMwIdPicture;

    return $this;
    }


    /**
     * Get the value of picture
     *
     * @return ?string
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param ?string $picture
     *
     * @return self
     */
    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}