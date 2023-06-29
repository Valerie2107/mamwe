<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;
class MappingSection extends MappingAbstract
{
    
    private int $mwIdSect;
    private string $mwTitleSect;
    private ?string $mwContentSect;
    private int $mwVisible;
    private ?int $mwPictureMwIdPicture;
    private ?string $picture;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }
    
    
    /**
     * Get the value of mwIdSect
     *
     * @return int
     */
    public function getMwIdSect(): int
    {
        return $this->mwIdSect;
    }

    /**
     * Set the value of mwIdSect
     *
     * @param int $mwIdSect
     *
     * @return self
     */
    public function setMwIdSect(int $mwIdSect): self
    {
        if($mwIdSect < 0 ) throw new Exception("La valeur ne paut pas être négative");
        $this->mwIdSect = $mwIdSect;

        return $this;
    }


    /**
     * Get the value of mwTitleSect
     *
     * @return string
     */
    public function getMwTitleSect(): string
    {
        return $this->mwTitleSect;
    }

    /**
     * Set the value of mwTitleSect
     *
     * @param string $mwTitleSect
     *
     * @return self
     */
    public function setMwTitleSect(string $mwTitleSect): self
    {
        if(strlen($mwTitleSect)>100){
            throw new Exception("Texte trop long");
        }else {
            $this->mwTitleSect = $mwTitleSect;
        }

        return $this;
    }


    /**
     * Get the value of mwContentSect
     *
     * @return string
     */
    public function getMwContentSect(): string
    {
        return $this->mwContentSect;
    }

    /**
     * Set the value of mwContentSect
     *
     * @param string $mwContentSect
     *
     * @return self
     */
    public function setMwContentSect(?string $mwContentSect): self
    {
        $this->mwContentSect = $mwContentSect;

        return $this;
    }

    /**
     * Get the value of mwVisible
     *
     * @return string
     */
    public function getMwVisible(): int
    {
        return $this->mwVisible;
    }

    /**
     * Set the value of mwVisible
     *
     * @param string $mwVisible
     *
     * @return self
     */
    public function setMwVisible(int $mwVisible): self
    {
        if($mwVisible < 0 ) throw new Exception("La valeur ne paut pas être négative");
        if($mwVisible > 2 ) throw new Exception("La valeur est trop grande");

        $this->mwVisible = $mwVisible;

        return $this;
    }

    

    /**
     * Get the value of mwPictureMwIdPicture
     *
     * @return int
     */
    public function getMwPictureMwIdPicture(): ?int
    {
        return $this->mwPictureMwIdPicture;
    }

    /**
     * Set the value of mwPictureMwIdPicture
     *
     * @param int $mwPictureMwIdPicture
     *
     * @return self
     */
    public function setMwPictureMwIdPicture(?int $mwPictureMwIdPicture): self
    {
        if($mwPictureMwIdPicture < 0 ) throw new Exception("La valeur ne paut pas être négative");
        $this->mwPictureMwIdPicture = $mwPictureMwIdPicture;

        return $this;
    }


    /**
     * Get the value of picture
     *
     * @return string
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @param string $picture
     *
     * @return self
     */
    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }
}