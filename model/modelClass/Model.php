<?php

namespace model\modelClass;

use model\abstractClass\MappingAbstract;

class model extends MappingAbstract
{
    
    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    public function __toString(): string
    {
        return "class model.php enfants de MappingAbstract.php";
    }
}