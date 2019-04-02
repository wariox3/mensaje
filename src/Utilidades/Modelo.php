<?php

namespace App\Utilidades;

use App\Entity\Vigencia;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Modelo
{
    private $em;
/*
*/
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    public function eliminar($entidad, $arrSeleccionados){
        //dd($entidad);
        try{
            $em = $this->em;
             if ($arrSeleccionados && is_array($arrSeleccionados)) {
                 foreach ($arrSeleccionados as $codigo) {
                     $arNorma = $em->getRepository($entidad)->find($codigo);
                     if ($arNorma) {
                         $em->remove($arNorma);
                     }
                 }
                 $em->flush();
             }
         } catch (\Exception $ex) {
            Mensajes::error("El registro tiene registros relacionados");
         }
    }

}