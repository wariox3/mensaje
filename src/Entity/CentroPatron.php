<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Norma
 *
 * @ORM\Table(name="centro_patron")
 * @ORM\Entity(repositoryClass="App\Repository\CentroPatronRepository")
 */
class CentroPatron
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $codigoCentroPatronPk;

    /**
     * @ORM\Column(name="codigo_centro_fk", type="integer", nullable=true)
     */
    private $codigoCentroFk;

    /**
     * @ORM\Column(name="codigo_patron_fk", type="integer", nullable=true)
     */
    private $codigoPatronFk;

    /**
     * @ORM\ManyToOne(targetEntity="Centro", inversedBy="centrosPatronesCentroRel")
     * @ORM\JoinColumn(name="codigo_centro_fk", referencedColumnName="codigo_centro_pk")
     */
    private $centroRel;

    /**
     * @ORM\ManyToOne(targetEntity="Patron", inversedBy="centrosPatronesPatronRel")
     * @ORM\JoinColumn(name="codigo_patron_fk", referencedColumnName="codigo_patron_pk")
     */
    private $patronRel;

    /**
     * @return mixed
     */
    public function getCodigoCentroPatronPk()
    {
        return $this->codigoCentroPatronPk;
    }

    /**
     * @param mixed $codigoCentroPatronPk
     */
    public function setCodigoCentroPatronPk($codigoCentroPatronPk): void
    {
        $this->codigoCentroPatronPk = $codigoCentroPatronPk;
    }

    /**
     * @return mixed
     */
    public function getCodigoCentroFk()
    {
        return $this->codigoCentroFk;
    }

    /**
     * @param mixed $codigoCentroFk
     */
    public function setCodigoCentroFk($codigoCentroFk): void
    {
        $this->codigoCentroFk = $codigoCentroFk;
    }

    /**
     * @return mixed
     */
    public function getCodigoPatronFk()
    {
        return $this->codigoPatronFk;
    }

    /**
     * @param mixed $codigoPatronFk
     */
    public function setCodigoPatronFk($codigoPatronFk): void
    {
        $this->codigoPatronFk = $codigoPatronFk;
    }

    /**
     * @return mixed
     */
    public function getCentroRel()
    {
        return $this->centroRel;
    }

    /**
     * @param mixed $centroRel
     */
    public function setCentroRel($centroRel): void
    {
        $this->centroRel = $centroRel;
    }

    /**
     * @return mixed
     */
    public function getPatronRel()
    {
        return $this->patronRel;
    }

    /**
     * @param mixed $patronRel
     */
    public function setPatronRel($patronRel): void
    {
        $this->patronRel = $patronRel;
    }



}
