<?php

namespace model\traitClass;
use DateTime;


trait DateTrait {
   public function dateTrait($date, $format = 'm/d/Y'){
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
    
}