<?php

namespace model\mappingClass;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingCategoryRessource extends MappingAbstract {

    private int $mwIdCategory;
    private string $mwTitleCategory;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }


    public function getMwIdCategory(): int
    {
        return $this->mwIdCategory;
    }

    /**
     * Set the value of mwCategoryId
     *
     * @param int $mwCategoryId
     *
     * @return self
     */
    public function setMwIDCategory(int $mwIdCategory): self
    {
        if ($mwIdCategory <= 0) {
            throw new Exception('ID de la catégorie doit être un entier positif');
        }
        $this->mwIdCategory = $mwIdCategory;

        return $this;
    }


    /**
     * Get the value of mwCategoryTitle
     *
     * @return string
     */
    public function getMwTitleCategory(): string
    {
        return $this->mwTitleCategory;
    }

    /**
     * Set the value of mwCategoryTitle
     *
     * @param string $mwCategoryTitle
     *
     * @return self
     */
    public function setMwTitleCategory(string $mwTitleCategory): self
    {
        if (strlen($mwTitleCategory) < 3) {
            throw new Exception('Le titre de la catégorie doit contenir au moins 3 caractères');
        }
        $this->mwTitleCategory = $mwTitleCategory;

        return $this;
    }



}
