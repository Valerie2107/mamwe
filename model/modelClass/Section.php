<?php

namespace model\modelClass;

use model\abstractClass\MappingAbstract;

class Section extends MappingAbstract
{
    
    private int $mwIdSection;
    private string $mwTitleSect;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }


    /**
     * Get the value of mwIdSection
     *
     * @return int
     */
    public function getMwIdSection(): int
    {
        return $this->mwIdSection;
    }

    /**
     * Set the value of mwIdSection
     *
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
     * Get the value of mwTitleSect
     *
     * @return string
     */
    public function getMwTitleSect(): string
    {
        return $this->mwTitleSect;
    }

    /**
     * Set the value of mwTitleSect
     *
     * @param string $mwTitleSect
     *
     * @return self
     */
    public function setMwTitleSect(string $mwTitleSect): self
    {
        $this->mwTitleSect = $mwTitleSect;

        return $this;
    }
}