<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;

class MappingPatient extends MappingAbstract{

    private int $mwIdPatient;
    private string $mwNamePatient;
    private string $mwSurnamePatient;
    private string $mwBirthdatePatient;
    private string $mwMailPatient;
    private int $mwPhonePatient;


    //  get-set mwIdPatient
    public function getMwIdPatient(){

        return $this->mwIdPatient;

    }

    public function setMwIdPatient(int $mwIdPatient):self
    {   
        $this->mwIdPatient = $mwIdPatient;

        return $this;
    }

    //  get-set mwNamePatient
    public function getMwNamePatient(){

        return $this->mwNamePatient;

    }

    public function setMwNamePatient(string $mwNamePatient):self
    {   
        $this->mwNamePatient = $mwNamePatient;

        return $this;
    }

    //  get-set mwSurnamePatient
    public function getMwSurnamePatient(){

        return $this->mwSurnamePatient;

    }

    public function setMwSurnamePatient(string $mwSurnamePatient):self
    {   
        $this->mwSurnamePatient = $mwSurnamePatient;

        return $this;
    }

    //  get-set mwBirthdatePatient

    public function getMwBirthdatePatient(){

        return $this->mwBirthdatePatient;

    }

    public function setMwBirthdatePatient(string $mwBirthdatePatient):self
    {   
        $this->mwBirthdatePatient = $mwBirthdatePatient;

        return $this;
    }

    //  get-set mwMailPatient
    public function getMwMailPatient(){

        return $this->mwMailPatient;

    }

    public function setMwMailPatient(string $mwMailPatient): void
    {
        if(filter_var($mwMailPatient, FILTER_VALIDATE_EMAIL)) {
            $this->mwMailPatient = $mwMailPatient;
        } else {
            throw new \Exception("Le mail n'est pas valide");
        }
    }


    //  get-set mwPhonePatient
    public function getMwPhonePatient(){

        return $this->mwPhonePatient;

    }

    public function setMwPhonePatient(int $mwPhonePatient):self
    {   
        $this->mwPhonePatient = $mwPhonePatient;

        return $this;
    }



}