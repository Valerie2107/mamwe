<?php

namespace model\mappingClass;
use model\abstractClass\MappingAbstract;
use Exception;

class MappingCategoryRessource extends MappingAbstract {

    private int $mwCategoryId;
    private string $mwCategoryTitle;
    private string $mwCategoryUrl;
    private string $mwCategoryContent;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    /**
     * Get the value of mwCategoryId
     *
     * @return int
     */
    public function getMwCategoryId(): int
    {
        return $this->mwCategoryId;
    }

    /**
     * Set the value of mwCategoryId
     *
     * @param int $mwCategoryId
     *
     * @return self
     */
    public function setMwCategoryId(int $mwCategoryId): self
    {
        if ($mwCategoryId <= 0) {
            throw new Exception('ID de la catégorie doit être un entier positif');
        }
        $this->mwCategoryId = $mwCategoryId;

        return $this;
    }

    /**
     * Get the value of mwCategoryTitle
     *
     * @return string
     */
    public function getMwCategoryTitle(): string
    {
        return $this->mwCategoryTitle;
    }

    /**
     * Set the value of mwCategoryTitle
     *
     * @param string $mwCategoryTitle
     *
     * @return self
     */
    public function setMwCategoryTitle(string $mwCategoryTitle): self
    {
        if (strlen($mwCategoryTitle) < 3) {
            throw new Exception('Le titre de la catégorie doit contenir au moins 3 caractères');
        }
        $this->mwCategoryTitle = $mwCategoryTitle;

        return $this;
    }

    /**
     * Get the value of mwCategoryUrl
     *
     * @return string
     */
    public function getMwCategoryUrl(): string
    {
        return $this->mwCategoryUrl;
    }

    /**
     * Set the value of mwCategoryUrl
     *
     * @param string $mwCategoryUrl
     *
     * @return self
     */
    public function setMwCategoryUrl(string $mwCategoryUrl): self
    {
        if (strlen($mwCategoryUrl) < 3) {
            throw new Exception('L\'url de la catégorie doit contenir au moins 3 caractères');
        }
        $this->mwCategoryUrl = $mwCategoryUrl;

        return $this;
    }

    /**
     * Get the value of mwCategoryContent
     *
     * @return string
     */
    public function getMwCategoryContent(): string
    {
        return $this->mwCategoryContent;
    }

    /**
     * Set the value of mwCategoryContent
     *
     * @param string $mwCategoryContent
     *
     * @return self
     */
    public function setMwCategoryContent(string $mwCategoryContent): self
    {
        if (strlen($mwCategoryContent) < 3) {
            throw new Exception('Le contenu de la catégorie doit contenir au moins 3 caractères');
        }
        $this->mwCategoryContent = $mwCategoryContent;

        return $this;
    }
}
