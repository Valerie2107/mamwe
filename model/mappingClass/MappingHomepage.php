<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;
class MappingHomepage extends MappingAbstract
{
    private int $mwIdHomepage;
    private string $mwContentHomepage;
    private string $mwDateHomepage;
    private ?int $mwPictureMwIdPicture;
    private ?string $picture;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }
    


    // GET de l'id // 

    public function getMwIdHomepage(): int
    {
        return $this->mwIdHomepage;
    }


    // SET // 
    
    public function setMwIdHomepage(int $mwIdHomepage ) : self
    {
        $this->mwIdHomepage = $mwIdHomepage;
        
        return $this;
    }



    // GET de content  // 
    public function getMwContentHomepage(): string
    {
        return $this->mwContentHomepage;
    }

    // SET //

    public function setMwContentHomepage(string $mwContentHomepage): self
    {
        $this->mwContentHomepage = $mwContentHomepage;

        return $this;
    }

    // GET de date // 

    public function getMwDateHomepage(): string
    {
        return $this->mwDateHomepage;
    }


    // SET // 

    public function setMwDateHomepage(string $mwDateHomepage): void
    {
        $this->mwDateHomepage = $mwDateHomepage;
    }


    // GET de picture // 
    public function getMwPictureMwIdPicture(): ?int
    {
        return $this->mwPictureMwIdPicture;
    }


    // set de picture // 

    public function setMwPictureMwIdPicture(?int $mwPictureMwIdPicture): self
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