<?php

namespace model\traitClass;
use DateTime;


trait DateTrait {
   public function dateTrait($date, $format = 'd/m/Y'){      
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    
}