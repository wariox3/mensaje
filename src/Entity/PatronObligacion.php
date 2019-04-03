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


}
