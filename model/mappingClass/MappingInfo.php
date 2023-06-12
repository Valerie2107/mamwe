<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;
class MappingInfo extends MappingAbstract
{

    private  int $mwIdInfo;
    private  string $mwContentInfo;
    private  string $mwDateInfo;
    private  ?int $mwPictureMwIdPicture;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }



    // Get de id // 

    public function getMwIdInfo(): int
    {
        return $this->mwIdInfo;
    }


    // SET // 
    
    public function setMwIdInfo(int $mwIdInfo ) : self
    {
        $this->mwIdInfo = $mwIdInfo;
        
        return $this;
    }

      // GET de content  // 
      public function getMwContentInfo(): string
      {
          return $this->mwContentInfo;
      }
  
      // SET //
  
      public function setMwContentInfo(string $mwContentInfo): self
      {
          $this->mwContentInfo = $mwContentInfo;
  
          return $this;
      }

          // GET de date // 

    public function getMwDateInfo(): string
    {
        return $this->mwDateInfo;
    }


    // SET // 

    public function setMwDateInfo(string $mwDateInfo): void
    {
        $this->mwDateInfo = $mwDateInfo;
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