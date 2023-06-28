<?php

namespace model\mappingClass;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingSubCategoryRessource extends MappingAbstract {

    private int $mwIdSubCategoryRessource;
    private string $mwTitleSubCategoryRessource;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    



    /**
     * Get the value of mwIdSubCategoryRessource
     *
     * @return int
     */
    public function getMwIdSubCategoryRessource(): int
    {
        return $this->mwIdSubCategoryRessource;
    }

    /**
     * Set the value of mwIdSubCategoryRessource
     *
     * @param int $mwIdSubCategoryRessource
     *
     * @return self
     */
    public function setMwIdSubCategoryRessource(int $mwIdSubCategoryRessource): self
    {
        $this->mwIdSubCategoryRessource = $mwIdSubCategoryRessource;

        return $this;
    }

    /**
     * Get the value of mwTitleSubCategoryRessource
     *
     * @return string
     */
    public function getMwTitleSubCategoryRessource(): string
    {
        return $this->mwTitleSubCategoryRessource;
    }

    /**
     * Set the value of mwTitleSubCategoryRessource
     *
     * @param string $mwTitleSubCategoryRessource
     *
     * @return self
     */
    public function setMwTitleSubCategoryRessource(string $mwTitleSubCategoryRessource): self
    {
        $this->mwTitleSubCategoryRessource = $mwTitleSubCategoryRessource;

        return $this;
    }
}
