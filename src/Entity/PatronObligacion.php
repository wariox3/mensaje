<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Norma
 *
 * @ORM\Table(name="patron_obligacion")
 * @ORM\Entity(repositoryClass="App\Repository\PatronObligacionRepository")
 */
class PatronObligacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $codigoPatronObligacionPk;

    /**
     * @ORM\Column(name="codigo_patron_fk", type="integer", nullable=true)
     */
    private $codigoPatronFk;

    /**
     * @ORM\Column(name="codigo_obligacion_fk", type="integer", nullable=true)
     */
    private $codigoObligacionFk;

    /**
     * @ORM\ManyToOne(targetEntity="Patron", inversedBy="patronesObligacionesPatronRel")
     * @ORM\JoinColumn(name="codigo_patron_fk", referencedColumnName="codigo_patron_pk")
     */
    private $patronRel;

    /**
     * @ORM\ManyToOne(targetEntity="Obligacion", inversedBy="patronesObligacionesObligacionRel")
     * @ORM\JoinColumn(name="codigo_obligacion_fk", referencedColumnName="codigo_obligacion_pk")
     */
    private $obligacionRel;

    /**
     * @return mixed
     */
    public function getCodigoPatronObligacionPk()
    {
        return $this->codigoPatronObligacionPk;
    }

    /**
     * @param mixed $codigoPatronObligacionPk
     */
    public function setCodigoPatronObligacionPk($codigoPatronObligacionPk): void
    {
        $this->codigoPatronObligacionPk = $codigoPatronObligacionPk;
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
    public function getCodigoObligacionFk()
    {
        return $this->codigoObligacionFk;
    }

    /**
     * @param mixed $codigoObligacionFk
     */
    public function setCodigoObligacionFk($codigoObligacionFk): void
    {
        $this->codigoObligacionFk = $codigoObligacionFk;
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

    /**
     * @return mixed
     */
    public function getObligacionRel()
    {
        return $this->obligacionRel;
    }

    /**
     * @param mixed $obligacionRel
     */
    public function setObligacionRel($obligacionRel): void
    {
        $this->obligacionRel = $obligacionRel;
    }



}
