<?php

namespace App\Controller;
use App\Entity\Centro;
use App\Entity\Cliente;


use App\Form\Type\CentroType;
use App\Utilidades\Modelo;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\Type\ClienteType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClienteController extends  Controller
{

    /**
    * @Route("/admin/cliente/nuevo/{id}", name="cliente_nuevo")
     */
    public function nuevo(Request $request, $id)
    {
     $em = $this->getDoctrine()->getManager();
        $arCliente = new Cliente();
        if ($id != 0 ){
            $arCliente = $em->getRepository(Cliente::class)->find($id);
        }
        $form = $this->createForm(ClienteType::class, $arCliente);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('guardar')->isClicked()) {
                $em->persist($form->getData());
                $em->flush();
                return $this->redirect($this->generateUrl('cliente_detalle', array('id' => $arCliente->getCodigoClientePk())));
            }
        }
        return $this->render('Cliente/nuevo.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/admin/cliente/lista", name="cliente_lista")
     */
    public function lista(Request $request )
    {
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');

        $form = $this->createFormBuilder()
            ->add('nombreCorto', TextType::class,['required' => false, 'data' => $session->get('filtroClienteNombreCorto')])
            ->add('btnFiltrar', SubmitType::class, ['label' => 'Filtrar', 'attr' => ['class' => 'btn btn-sm btn-default']])
            ->add('btnEliminar', SubmitType::class, ['label' => 'Eliminar', 'attr' => ['class' => 'btn btn-sm btn-default']])
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('btnFiltrar')->isClicked()) {
               $session->set('filtroClienteNombreCorto', $form->get('nombreCorto')->getData());
            }
            if ($form->get('btnEliminar')->isClicked()) {
                $arrSeleccionados = $request->request->get('ChkSeleccionar');
                $this->get("UtilidadesModelo")->eliminar(Cliente::class, $arrSeleccionados);
                return $this->redirect($this->generateUrl('cliente_lista'));
            }
        }

        $arClientes= $paginator->paginate($em->getRepository(Cliente::class)->lista(),$request->query->getInt('page', 1), 30);
        return $this->render('Cliente/lista.html.twig', [
            'arClientes' => $arClientes,
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/admin/cliente/detalle/{id}", name="cliente_detalle")
     */
    public function detalle(Request $request, $id)
    {
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $arCliente = $em->getRepository(Cliente::class)->find($id);
        $form = $this->createFormBuilder()
            ->add('claveCentro', TextType::class, ['required' => false, 'label' => 'Clave', 'attr' => ['class' => 'btn btn-sm btn-default']])
            ->add('nombreCentro', TextType::class, ['required' => false, 'label' => 'Nombre', 'attr' => ['class' => 'btn btn-sm btn-default']])
            ->add('btnEliminarCentro', SubmitType::class, ['label' => 'Eliminar', 'attr' => ['class' => 'btn btn-sm btn-default']])
            ->add('btnFiltrarCentro', SubmitType::class, ['label' => 'Filtrar', 'attr' => ['class' => 'btn btn-sm btn-default']])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->get('btnFiltrarCentro')->isClicked()) {
                $session->set('filtroClaveCentro', $form->get('claveCentro')->getData());
                $session->set('filtroNombreCentro', $form->get('nombreCentro')->getData());
            }

            if ($form->get('btnEliminarCentro')->isClicked()) {
                $arrClientesSeleccionados = $request->request->get('ChkSeleccionarCentros');
                $this->get("UtilidadesModelo")->eliminar(centro::class, $arrClientesSeleccionados);
                return $this->redirect($this->generateUrl('cliente_detalle', ['id' => $id]));

            }

            return $this->redirect($this->generateUrl('cliente_detalle', ['id' => $id]));
        }

        $arCentros = $paginator->paginate($em->getRepository(Centro::class)->listaCentro($id), $request->query->getInt('page', 1), 30);

        return $this->render('Cliente/detalle.html.twig', [
            'form' => $form->createView(),
            'arCliente' => $arCliente,
            'arCentros' => $arCentros
        ]);
    }

    /**
     * @Route("/admin/cliente/centro/nuevo/{id}/{codigoCliente}", name="cliente_centro_nuevo")
     */
    public function nuevoCentro(Request $request, $id, $codigoCliente)
    {
        $em = $this->getDoctrine()->getManager();
        $arCliente = $em->getRepository(Cliente::class)->find($codigoCliente);
        $arCentro = new Centro();
        if ($id != 0) {
            $arCentro = $em->getRepository(Centro::class)->find($id);
        } else {
            $arCentro->setClienteRel($arCliente);
        }
        $form = $this->createForm(CentroType::class, $arCentro);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('guardar')->isClicked()) {
                $arCentro = $form->getData();
                $em->persist($arCentro);
                $em->flush();
                echo "<script languaje='javascript' type='text/javascript'>window.close();window.opener.location.reload();</script>";
            }
        }
        return $this->render('Cliente/nuevoCentro.html.twig', [
            'arCentro' => $arCentro,
            'form' => $form->createView()
        ]);

    }

}