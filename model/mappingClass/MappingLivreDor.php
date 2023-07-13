<?php

namespace model\mappingClass;

use model\abstractClass\MappingAbstract;
use model\traitClass\DateTrait;
use DateTime;
use Exception;

class MappingLivreDor extends MappingAbstract
{
    
    use DateTrait;

    private int $mwIdLivreDor;
    private string $mwNameLivreDor;
    private string $mwMailLivreDor;
    private string $mwMessageLivreDor;
    private string $mwDateLivreDor;
    protected int $mwVisibleLivreDor;
    
    public function __construct(array $tab)
    {
        parent::__construct($tab);
    }

    /**
     * Get the value of mwIdLivreDor
     *
     * @return int
     */
    public function getMwIdLivreDor(): int
    {
        return $this->mwIdLivreDor;
    }

    /**
     * Set the value of mwIdLivreDor
     *
     * @param int $mwIdLivreDor
     *
     * @return self
     */
    public function setMwIdLivreDor(int $mwIdLivreDor): self
    {
        if ($mwIdLivreDor < 0) throw new Exception("L'id du livre d'or ne peut pas être négatif");
        $this->mwIdLivreDor = $mwIdLivreDor;

        return $this;
    }

    /**
     * Get the value of mwNameLivreDor
     *
     * @return string
     */
    public function getMwNameLivreDor(): string
    {
        return $this->mwNameLivreDor;
    }

    /**
     * Set the value of mwNameLivreDor
     *
     * @param string $mwNameLivreDor
     *
     * @return self
     */
    public function setMwNameLivreDor(string $mwNameLivreDor): self
    {
        if (strlen($mwNameLivreDor) > 100  ) throw new Exception("Le nom est trop long");
        if (strlen($mwNameLivreDor) < 2) throw new Exception("Le nom est trop court");
        $this->mwNameLivreDor = $mwNameLivreDor;

        return $this;
    }

    /**
     * Get the value of mwMailLivreDor
     *
     * @return string
     */
    public function getMwMailLivreDor(): string
    {
        return $this->mwMailLivreDor;
    }

    /**
     * Set the value of mwMailLivreDor
     *
     * @param string $mwMailLivreDor
     *
     * @return self
     */
    public function setMwMailLivreDor(string $mwMailLivreDor): self
    {
        if (!filter_var($mwMailLivreDor, FILTER_VALIDATE_EMAIL)) throw new Exception("L'email n'est pas valide");
        if (strlen($mwMailLivreDor) > 100) throw new Exception("L'email est trop long");
        $this->mwMailLivreDor = $mwMailLivreDor;

        return $this;
    }

    /**
     * Get the value of mwMessageLivreDor
     *
     * @return string
     */
    public function getMwMessageLivreDor(): string
    {
        return $this->mwMessageLivreDor;
    }

    /**
     * Set the value of mwMessageLivreDor
     *
     * @param string $mwMessageLivreDor
     *
     * @return self
     */
    public function setMwMessageLivreDor(string $mwMessageLivreDor): self
    {
        if (strlen($mwMessageLivreDor) > 2500) throw new Exception("Le message est trop long");
        if (strlen($mwMessageLivreDor) < 25) throw new Exception("Le message est trop court");
        $this->mwMessageLivreDor = $mwMessageLivreDor;

        return $this;
    }

    /**
     * Get the value of mwDateLivreDor
     *
     * @return string
     */
    public function getMwDateLivreDor(): string
    {
        return $this->mwDateLivreDor;
    }

    /**
     * Set the value of mwDateLivreDor
     *
     * @param string $mwDateLivreDor
     *
     * @return self
     */
    public function setMwDateLivreDor(string $mwDateLivreDor): self
    {
        if (!$this->dateTrait($mwDateLivreDor, 'Y-m-d')) {
            throw new Exception('Date incorrecte, format attendu : Y-m-d');
        }

        // Crée un nouvel objet DateTime pour l'heure actuelle
        $now = new DateTime();

        // Met à jour mwDateArt avec la date et l'heure actuelles, au format Y-m-d
        $this -> mwDateLivreDor = $now->format('Y-m-d');

        return $this;
    }

    /**
     * Get the value of mwVisibleLivreDor
     *
     * @return int
     */
    public function getMwVisibleLivreDor(): int
    {
        return $this->mwVisibleLivreDor;
    }

    /**
     * Set the value of mwVisibleLivreDor
     *
     * @param int $mwVisibleLivreDor
     *
     * @return self
     */
    public function setMwVisibleLivreDor(int $mwVisibleLivreDor): self
    {
        if($mwVisibleLivreDor > 4 ) throw new Exception("La valeur entrée est trop grande");
        if($mwVisibleLivreDor < 0 ) throw new Exception("la valeure ne peut pas être négative");

        $this->mwVisibleLivreDor = $mwVisibleLivreDor;

        return $this;
    }
}