<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Obligacion
 *
 * @ORM\Table(name="obligacion")
 * @ORM\Entity(repositoryClass="App\Repository\ObligacionRepository")
 */
class Obligacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $codigoObligacionPk;

    /**
     * @ORM\Column(name="codigo_norma_fk", type="integer", nullable=true)
     */
    private $codigoNormaFk;

    /**
     * @ORM\Column(name="codigo_matriz_fk", type="integer", nullable=true)
     */
    private $codigoMatrizFk;

    /**
     * @ORM\Column(name="obligacion", type="text", nullable=true)
     */
    private $obligacion;

    /**
     * @ORM\Column(name="verificable", type="boolean", nullable=true, options={"default" : false})
     */
    private $verificable = false;

    /**
     * @ORM\Column(name="estado_derogado", type="boolean", nullable=true, options={"default" : false})
     */
    private $estadoDerogado = false;

    /**
     * @ORM\Column(name="codigo_accion_fk", type="string", length=30, nullable=true)
     */
    private $codigoAccionFk;

    /**
     * @ORM\Column(name="codigo_grupo_fk", type="string", length=30, nullable=true)
     */
    private $codigoGrupoFk;

    /**
     * @ORM\Column(name="codigo_subgrupo_fk", type="string", length=30, nullable=true)
     */
    private $codigoSubgrupoFk;

    /**
     * @ORM\Column(name="codigo_clasificacion_fk", type="string", length=30, nullable=true)
     */
    private $codigoClasificacionFk;

    /**
     * @ORM\ManyToOne(targetEntity="Norma", inversedBy="obligacionesNormaRel")
     * @ORM\JoinColumn(name="codigo_norma_fk", referencedColumnName="codigo_norma_pk")
     */
    private $normaRel;

    /**
     * @ORM\ManyToOne(targetEntity="Accion", inversedBy="obligacionesAccionRel")
     * @ORM\JoinColumn(name="codigo_accion_fk", referencedColumnName="codigo_accion_pk")
     */
    private $accionRel;

    /**
     * @ORM\ManyToOne(targetEntity="Grupo", inversedBy="obligacionesGrupoRel")
     * @ORM\JoinColumn(name="codigo_grupo_fk", referencedColumnName="codigo_grupo_pk")
     */
    private $grupoRel;

    /**
     * @ORM\ManyToOne(targetEntity="Subgrupo", inversedBy="obligacionesSubgrupoRel")
     * @ORM\JoinColumn(name="codigo_subgrupo_fk", referencedColumnName="codigo_subgrupo_pk")
     */
    private $subgrupoRel;

    /**
     * @ORM\ManyToOne(targetEntity="Clasificacion", inversedBy="obligacionesClasificacionRel")
     * @ORM\JoinColumn(name="codigo_clasificacion_fk", referencedColumnName="codigo_clasificacion_pk")
     */
    private $clasificacionRel;

    /**
     * @ORM\ManyToOne(targetEntity="Matriz", inversedBy="obligacionesMatrizRel")
     * @ORM\JoinColumn(name="codigo_matriz_fk", referencedColumnName="codigo_matriz_pk")
     */
    private $matrizRel;

    /**
     * @ORM\OneToMany(targetEntity="PatronObligacion", mappedBy="obligacionRel")
     */
    protected $patronesObligacionesObligacionRel;

    /**
     * @return mixed
     */
    public function getCodigoObligacionPk()
    {
        return $this->codigoObligacionPk;
    }

    /**
     * @param mixed $codigoObligacionPk
     */
    public function setCodigoObligacionPk($codigoObligacionPk): void
    {
        $this->codigoObligacionPk = $codigoObligacionPk;
    }

    /**
     * @return mixed
     */
    public function getCodigoNormaFk()
    {
        return $this->codigoNormaFk;
    }

    /**
     * @param mixed $codigoNormaFk
     */
    public function setCodigoNormaFk($codigoNormaFk): void
    {
        $this->codigoNormaFk = $codigoNormaFk;
    }

    /**
     * @return mixed
     */
    public function getObligacion()
    {
        return $this->obligacion;
    }

    /**
     * @param mixed $obligacion
     */
    public function setObligacion($obligacion): void
    {
        $this->obligacion = $obligacion;
    }

    /**
     * @return mixed
     */
    public function getVerificable()
    {
        return $this->verificable;
    }

    /**
     * @param mixed $verificable
     */
    public function setVerificable($verificable): void
    {
        $this->verificable = $verificable;
    }

    /**
     * @return mixed
     */
    public function getEstadoDerogado()
    {
        return $this->estadoDerogado;
    }

    /**
     * @param mixed $estadoDerogado
     */
    public function setEstadoDerogado($estadoDerogado): void
    {
        $this->estadoDerogado = $estadoDerogado;
    }

    /**
     * @return mixed
     */
    public function getCodigoAccionFk()
    {
        return $this->codigoAccionFk;
    }

    /**
     * @param mixed $codigoAccionFk
     */
    public function setCodigoAccionFk($codigoAccionFk): void
    {
        $this->codigoAccionFk = $codigoAccionFk;
    }

    /**
     * @return mixed
     */
    public function getNormaRel()
    {
        return $this->normaRel;
    }

    /**
     * @param mixed $normaRel
     */
    public function setNormaRel($normaRel): void
    {
        $this->normaRel = $normaRel;
    }

    /**
     * @return mixed
     */
    public function getAccionRel()
    {
        return $this->accionRel;
    }

    /**
     * @param mixed $accionRel
     */
    public function setAccionRel($accionRel): void
    {
        $this->accionRel = $accionRel;
    }

    /**
     * @return mixed
     */
    public function getCodigoSubgrupoFk()
    {
        return $this->codigoSubgrupoFk;
    }

    /**
     * @param mixed $codigoSubgrupoFk
     */
    public function setCodigoSubgrupoFk($codigoSubgrupoFk): void
    {
        $this->codigoSubgrupoFk = $codigoSubgrupoFk;
    }

    /**
     * @return mixed
     */
    public function getSubgrupoRel()
    {
        return $this->subgrupoRel;
    }

    /**
     * @param mixed $subgrupoRel
     */
    public function setSubgrupoRel($subgrupoRel): void
    {
        $this->subgrupoRel = $subgrupoRel;
    }

    /**
     * @return mixed
     */
    public function getCodigoMatrizFk()
    {
        return $this->codigoMatrizFk;
    }

    /**
     * @param mixed $codigoMatrizFk
     */
    public function setCodigoMatrizFk($codigoMatrizFk): void
    {
        $this->codigoMatrizFk = $codigoMatrizFk;
    }

    /**
     * @return mixed
     */
    public function getMatrizRel()
    {
        return $this->matrizRel;
    }

    /**
     * @param mixed $matrizRel
     */
    public function setMatrizRel($matrizRel): void
    {
        $this->matrizRel = $matrizRel;
    }

    /**
     * @return mixed
     */
    public function getCodigoGrupoFk()
    {
        return $this->codigoGrupoFk;
    }

    /**
     * @param mixed $codigoGrupoFk
     */
    public function setCodigoGrupoFk($codigoGrupoFk): void
    {
        $this->codigoGrupoFk = $codigoGrupoFk;
    }

    /**
     * @return mixed
     */
    public function getGrupoRel()
    {
        return $this->grupoRel;
    }

    /**
     * @param mixed $grupoRel
     */
    public function setGrupoRel($grupoRel): void
    {
        $this->grupoRel = $grupoRel;
    }

    /**
     * @return mixed
     */
    public function getCodigoClasificacionFk()
    {
        return $this->codigoClasificacionFk;
    }

    /**
     * @param mixed $codigoClasificacionFk
     */
    public function setCodigoClasificacionFk($codigoClasificacionFk): void
    {
        $this->codigoClasificacionFk = $codigoClasificacionFk;
    }

    /**
     * @return mixed
     */
    public function getClasificacionRel()
    {
        return $this->clasificacionRel;
    }

    /**
     * @param mixed $clasificacionRel
     */
    public function setClasificacionRel($clasificacionRel): void
    {
        $this->clasificacionRel = $clasificacionRel;
    }

    /**
     * @return mixed
     */
    public function getPatronesObligacionesObligacionRel()
    {
        return $this->patronesObligacionesObligacionRel;
    }

    /**
     * @param mixed $patronesObligacionesObligacionRel
     */
    public function setPatronesObligacionesObligacionRel($patronesObligacionesObligacionRel): void
    {
        $this->patronesObligacionesObligacionRel = $patronesObligacionesObligacionRel;
    }



}
