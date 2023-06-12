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

}