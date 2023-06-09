<?php

namespace model\modelClass;

use model\abstractClass\MappingAbstract;

class Section extends MappingAbstract
{
    
    private int $mwIdSect;
    private string $mwTitleSect;

    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }
    
    
    /**
     * Get the value of mwIdSect
     *
     * @return int
     */
    public function getMwIdSect(): int
    {
        return $this->mwIdSect;
    }

    /**
     * Set the value of mwIdSect
     *
     * @param int $mwIdSect
     *
     * @return self
     */
    public function setMwIdSect(int $mwIdSect): self
    {
        $this->mwIdSect = $mwIdSect;

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