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


}
