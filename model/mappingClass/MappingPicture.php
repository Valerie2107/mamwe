<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;

class MappingPicture extends MappingAbstract{

    private int $mwIdPicture;
    private string $mwTitlePicture;
    private string $mwUrlPicture;
    private ?int $mwArticleMwIdArticle;


    //  get-set mwIdPicture
    public function getMwIdPicture(){

       return $this->mwIdPicture;

    }

    public function setMwIdPicture(int $mwIdPicture):self
    {   
        $this->mwIdPicture = $mwIdPicture;

        return $this;
    }

    //  get-set mwTitlePicture
    public function getMwTitlePicture(){
       
        return $this->mwTitlePicture;
    
    }

    public function setMwTitlePicture(string $mwTitlePicture): self
    {
        $this->mwTitlePicture = $mwTitlePicture;

        return $this;

    }

    //  get-set mwUrlPicture
    public function getMwUrlPicture(){

        return $this->mwUrlPicture;

    }

    public function setMwUrlPicture(string $mwUrlPicture):self
    {
        $this->mwUrlPicture = $mwUrlPicture;

        return $this;
    }


    //  get-set mwArticleMwIdArticle

    public function getMwArticleMwIdArticle() 
    {
       return $this->mwArticleMwIdArticle;
    }

    public function setMwArticleMwIdArticle(?int $mwArticleMwIdArticle):self
    {
        $this->mwArticleMwIdArticle = $mwArticleMwIdArticle;
        return $this;
    }

}