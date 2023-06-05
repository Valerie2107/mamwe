<?php

namespace model;

use model\abstractClass\MappingAbstract;

class model extends MappingAbstract
{
    public function __toString(): string
    {
        return "class model.php enfants de MappingAbstract.php";
    }
}