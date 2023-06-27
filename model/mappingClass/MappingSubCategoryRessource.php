<?php

namespace model\mappingClass;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingSubCategoryRessource extends MappingAbstract {

    private int $mwSubCategoryId;
    private string $mwSubCategoryTitle;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    /**
     * Get the value of mwCategoryId
     *
     * @return int
     */
    public function getMwSubCategoryId(): int
    {
        return $this->mwSubCategoryId;
    }

    /**
     * Set the value of mwCategoryId
     *
     * @param int $mwCategoryId
     *
     * @return self
     */
    public function setMwSubCategoryId(int $mwSubCategoryId): self
    {
        if ($mwSubCategoryId <= 0) {
            throw new Exception('ID de la catégorie doit être un entier positif');
        }
        $this->mwSubCategoryId = $mwSubCategoryId;

        return $this;
    }

    /**
     * Get the value of mwCategoryTitle
     *
     * @return string
     */
    public function getMwSubCategoryTitle(): string
    {
        return $this->mwSubCategoryTitle;
    }

    /**
     * Set the value of mwCategoryTitle
     *
     * @param string $mwCategoryTitle
     *
     * @return self
     */
    public function setMwSubCategoryTitle(string $mwSubCategoryTitle): self
    {
        if (strlen($mwSubCategoryTitle) < 3) {
            throw new Exception('Le titre de la catégorie doit contenir au moins 3 caractères');
        }
        $this->mwSubCategoryTitle = $mwSubCategoryTitle;

        return $this;
    }



}
