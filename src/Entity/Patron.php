<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patron
 *
 * @ORM\Table(name="patron")
 * @ORM\Entity(repositoryClass="App\Repository\PatronRepository")
 */
class Patron
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $codigoPatronPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="PatronObligacion", mappedBy="patronRel")
     */
    protected $patronesObligacionesPatronRel;

    /**
     * @ORM\OneToMany(targetEntity="CentroPatron", mappedBy="patronRel")
     */
    protected $centrosPatronesPatronRel;

    /**
     * @return mixed
     */
    public function getCodigoPatronPk()
    {
        return $this->codigoPatronPk;
    }

    /**
     * @param mixed $codigoPatronPk
     */
    public function setCodigoPatronPk($codigoPatronPk): void
    {
        $this->codigoPatronPk = $codigoPatronPk;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPatronesObligacionesPatronRel()
    {
        return $this->patronesObligacionesPatronRel;
    }

    /**
     * @param mixed $patronesObligacionesPatronRel
     */
    public function setPatronesObligacionesPatronRel($patronesObligacionesPatronRel): void
    {
        $this->patronesObligacionesPatronRel = $patronesObligacionesPatronRel;
    }

    /**
     * @return mixed
     */
    public function getCentrosPatronesPatronRel()
    {
        return $this->centrosPatronesPatronRel;
    }

    /**
     * @param mixed $centrosPatronesPatronRel
     */
    public function setCentrosPatronesPatronRel($centrosPatronesPatronRel): void
    {
        $this->centrosPatronesPatronRel = $centrosPatronesPatronRel;
    }



}
