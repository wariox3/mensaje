<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centro
 *
 * @ORM\Table(name="centro")
 * @ORM\Entity(repositoryClass="App\Repository\CentroRepository")
 */
class Centro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $codigoCentroPk;

    /**
     * @ORM\Column(name="nombre", type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(name="codigo_cliente_fk", type="integer")
     */
    private $codigoClienteFk;

    /**
     * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="centrosClienteRel")
     * @ORM\JoinColumn(name="codigo_cliente_fk", referencedColumnName="codigo_cliente_pk")
     */
    private $clienteRel;

    /**
     * @ORM\OneToMany(targetEntity="Malla", mappedBy="centroRel")
     */
    protected $mallasCentroRel;

    /**
     * @return mixed
     */
    public function getCodigoCentroPk()
    {
        return $this->codigoCentroPk;
    }

    /**
     * @param mixed $codigoCentroPk
     */
    public function setCodigoCentroPk($codigoCentroPk): void
    {
        $this->codigoCentroPk = $codigoCentroPk;
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
    public function getCodigoClienteFk()
    {
        return $this->codigoClienteFk;
    }

    /**
     * @param mixed $codigoClienteFk
     */
    public function setCodigoClienteFk($codigoClienteFk): void
    {
        $this->codigoClienteFk = $codigoClienteFk;
    }

    /**
     * @return mixed
     */
    public function getClienteRel()
    {
        return $this->clienteRel;
    }

    /**
     * @param mixed $clienteRel
     */
    public function setClienteRel($clienteRel): void
    {
        $this->clienteRel = $clienteRel;
    }

    /**
     * @return mixed
     */
    public function getMallasCentroRel()
    {
        return $this->mallasCentroRel;
    }

    /**
     * @param mixed $mallasCentroRel
     */
    public function setMallasCentroRel($mallasCentroRel): void
    {
        $this->mallasCentroRel = $mallasCentroRel;
    }

}
