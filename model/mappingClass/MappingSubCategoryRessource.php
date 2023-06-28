<?php

namespace model\mappingClass;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingSubCategoryRessource extends MappingAbstract {

    private int $mwIdSubCategory;
    private string $mwTitleSubCategory;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }


    /**
     * Get the value of mwIdSubCategory
     *
     * @return int
     */
    public function getMwIdSubCategory(): int
    {
        return $this->mwIdSubCategory;
    }

    /**
     * Set the value of mwIdSubCategory
     *
     * @param int $mwIdSubCategory
     *
     * @return self
     */
    public function setMwIdSubCategory(int $mwIdSubCategory): self
    {
        $this->mwIdSubCategory = $mwIdSubCategory;

        return $this;
    }

    /**
     * Get the value of mwTitleSubCategory
     *
     * @return string
     */
    public function getMwTitleSubCategory(): string
    {
        return $this->mwTitleSubCategory;
    }

    /**
     * Set the value of mwTitleSubCategory
     *
     * @param string $mwTitleSubCategory
     *
     * @return self
     */
    public function setMwTitleSubCategory(string $mwTitleSubCategory): self
    {
        $this->mwTitleSubCategory = $mwTitleSubCategory;

        return $this;
    }
}
