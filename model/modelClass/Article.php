<?php

namespace model\modelClass;

use model\abstractClass\MappingAbstract;

class Article extends MappingAbstract
{
    private int $mwIdArticle;
    private string $mwTitleArt;
    private string $mwContentArt;
    private string $mwDateArt;
    private int $mwIdSection;
    private int $mwIdUser;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    /**
     * Get the value of mwIdArticle
     *
     * @return int
     */
    public function getMwIdArticle(): int
    {
        return $this->mwIdArticle;
    }

    /**
     * Set the value of mwIdArticle
     *
     * @param int $mwIdArticle
     *
     * @return self
     */
    public function setMwIdArticle(int $mwIdArticle): self
    {
        $this->mwIdArticle = $mwIdArticle;

        return $this;
    }

    /**
     * Get the value of mwTitleArt
     *
     * @return string
     */
    public function getMwTitleArt(): string
    {
        return $this->mwTitleArt;
    }

    /**
     * Set the value of mwTitleArt
     *
     * @param string $mwTitleArt
     *
     * @return self
     */
    public function setMwTitleArt(string $mwTitleArt): self
    {
        $this->mwTitleArt = $mwTitleArt;

        return $this;
    }

    /**
     * Get the value of mwContentArt
     *
     * @return string
     */

    public function getMwContentArt(): string
    {
        return $this->mwContentArt;
    }

    /**
     * Set the value of mwContentArt
     *
     * @param string $mwContentArt
     *
     * @return self
     */

    public function setMwContentArt(string $mwContentArt): self
    {
        $this->mwContentArt = $mwContentArt;

        return $this;
    }

    /**
     * @return string
     */
    public function getMwDateArt(): string
    {
        return $this->mwDateArt;
    }

    /**
     * @param string $mwDateArt
     *
     * @return self
     */

    public function setMwDateArt(string $mwDateArt): self
    {
        $this->mwDateArt = $mwDateArt;

        return $this;
    }

    /**
     * @return int
     */
    public function getMwIdSection(): int
    {
        return $this->mwIdSection;
    }

    /**
     * @param int $mwIdSection
     *
     * @return self
     */

    public function setMwIdSection(int $mwIdSection): self
    {
        $this->mwIdSection = $mwIdSection;

        return $this;
    }

    /**
     * Get the value of mwIdUser
     *
     * @return int
     */

    public function getMwIdUser(): int
    {
        return $this->mwIdUser;
    }

    /**
     * Set the value of mwIdUser
     *
     * @param int $mwIdUser
     *
     * @return self
     */

    public function setMwIdUser(int $mwIdUser): self
    {
        $this->mwIdUser = $mwIdUser;

        return $this;
    }
}