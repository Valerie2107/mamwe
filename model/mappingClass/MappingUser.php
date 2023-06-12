<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;
class MappingUser extends MappingAbstract

{

    private int $mwidUser;
    private  string $mwloginUser;
    private  string $mwmailUser;
    private  string $mwpwdUser;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }


   
// GET de id // 
public function getMwIdUser(): int
{
    return $this->mwidUser;
}


// SET de id //


public function setMwIdUser(int $mwidUser): void
{
    $this->mwidUser = $mwidUser;
}





// GET de login // 


public function getMwLoginUser(): string
{
    return $this->mwloginUser;
}



// set de login // 

public function setMwLoginUser(string $mwloginUser): void
{
    $this->mwloginUser = $mwloginUser;
}








// Get de mail // 

public function getMwMailUser(): string
{
    return $this->mwmailUser;
}


// set de mail avec boucle en cas de email non valide // 

public function setMwMailUser(string $mwmailUser): void
{
    if(filter_var($mwmailUser, FILTER_VALIDATE_EMAIL)) {
        $this->mwmailUser = $mwmailUser;
    } else {
        throw new \Exception("Le mail n'est pas valide");
    }
}




// get de pwd // 

public function getMwPwdUser(): string
{
    return $this->mwpwdUser;
}


// set de pwd // 
public function setMwPwdUser(string $mwpwdUser): void
{
    $this->mwpwdUser = $mwpwdUser;
}

}