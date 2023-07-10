<?php

namespace model\mappingClass;

use DateTime;
use model\traitClass\DateTrait;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingInfo extends MappingAbstract
{
    use DateTrait;

    private  int $mwIdInfo;
    private  string $mwContentInfo;
    private  string $mwDateInfo;
    private  ?string $mwPictureMwIdPicture;

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
    
    /**
     * @param string $mwDateAgenda
     *
     * @return self
     * @throws Exception
     */
    public function setMwDateInfo(string $mwDateInfo): self
    {
        if (!$this->DateTrait($mwDateInfo, 'Y-m-d')) {
            throw new Exception('Date incorrecte, format attendu : Y/m/d');
        }

        $now = new DateTime();

 
        $this->mwDateInfo = $now->format('Y-m-d');

        return $this;
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