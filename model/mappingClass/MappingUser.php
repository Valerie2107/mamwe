<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use Exception;


class MappingUser extends MappingAbstract

{

    private int $mwIdUser;
    private string $mwLoginUser;
    private string $mwMailUser;
    private string $mwPwdUser;


    public function __construct(array $tab)
    {
        parent::__construct($tab);
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


    /**
     * Get the value of mwLoginUser
     *
     * @return string
     */
    public function getMwLoginUser(): string
    {
        return $this->mwLoginUser;
    }

    /**
     * Set the value of mwLoginUser
     *
     * @param string $mwLoginUser
     *
     * @return self
     */
    public function setMwLoginUser(string $mwLoginUser): self
    {
        $this->mwLoginUser = $mwLoginUser;

        return $this;
    }


    /**
     * Get the value of mwMailUser
     *
     * @return string
     */
    public function getMwMailUser(): string
    {
        return $this->mwMailUser;
    }

    /**
     * Set the value of mwMailUser
     *
     * @param string $mwMailUser
     *
     * @return self
     */
    public function setMwMailUser(string $mwMailUser): self
    {

        if(filter_var($mwMailUser, FILTER_VALIDATE_EMAIL)){
            $this -> mwMailUser = $mwMailUser;
        }else{
            echo "L'adresse e-mail n'est pas valide";
        }
        
        return $this;     
    }




    /**
     * Get the value of mwPwdUser
     *
     * @return string
     */
    public function getMwPwdUser(): string
    {
        return $this->mwPwdUser;
    }

    /**
     * Set the value of mwPwdUser
     *
     * @param string $mwPwdUser
     *
     * @return self
     */
    public function setMwPwdUser(string $mwPwdUser): self
    {
        $this->mwPwdUser = $mwPwdUser;

        return $this;
    }
}