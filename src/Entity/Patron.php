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


}
