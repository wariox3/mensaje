<?php

namespace App\Repository;

use App\Entity\Centro;
use App\Entity\Cliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class CentroRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Centro::class);
    }

    public function listaCentro($codigoCLiente)
    {
        $session = new Session();

        $queryBuilder = $this->getEntityManager()->createQueryBuilder()->from(Centro::class, 'ce')
            ->select('ce.codigoCentroPk')
            ->addSelect('ce.nombre')
            ->leftJoin('ce.clienteRel' , 'cl')
            ->where('cl.codigoClientePk = ' . $codigoCLiente);

        if ($session->get('filtroClaveCentro') != '') {
            $queryBuilder->andWhere("ce.codigoCentroPk = '{$session->get('filtroClaveCentro')}'");
        }
        if ($session->get('filtroNombreCentro') != '') {
            $queryBuilder->andWhere("ce.nombre = '{$session->get('filtroNombreCentro')}'");
        }

        return $queryBuilder;

    }
}