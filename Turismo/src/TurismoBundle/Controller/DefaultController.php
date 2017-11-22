<?php

namespace TurismoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use TurismoBundle\Entity\Turismo;
use TurismoBundle\Form\TurismoType;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('TurismoBundle:Default:index.html.twig');
    }

    /**
     * @Route("/listado")
     */
    public function listarAction()
    {
        return $this->render('TurismoBundle:Default:listado.html.twig');
    }

    /**
     * @Route("/datos")
     */
    public function datosAction()
    {
        return $this->render('TurismoBundle:Default:datos.html.twig');
    }

    /**
     * @Route("/mostrar")
     */
    public function mostrarAction()
    {
        $repository = $this->getDoctrine()->getRepository('TurismoBundle:Turismo');
        $turismo = $repository->findAll();
        return $this->render('TurismoBundle:Default:mostrar.html.twig',array('turismos' =>$turismo ));
    }


//Le pasamos la localidad que nosotros queremos por la url

    /**
     * @Route("/localidad/{localidad}", name="localidad")
     */
    public function findAction($localidad)
    {
        $repository = $this->getDoctrine()->getRepository('TurismoBundle:Turismo');
        //Hacemos un findByLocalidad para que nos lo busque por localidades
        $turismo = $repository->findByLocalidad($localidad);
        return $this->render('TurismoBundle:Default:localidad.html.twig',array('turismos' =>$turismo ));
    }


    //El id que le pasamos se envia por defeto desde el enlace de la pagina localidad
    
    /**
     * @Route("/detalles/{id}", name="detalles")
     */
    public function detallesAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('TurismoBundle:Turismo');
        //Aqui solo tenemos que hacer un findById para que lo busque por el ide que le hemos pasado y ya esta
        $turismo = $repository->findById($id);
        return $this->render('TurismoBundle:Default:detalles.html.twig',array('turismos' =>$turismo ));
    }

    /**
     * @Route("/insertar")
    */
    public function nuevoAction()
    {
      $turismo=new Turismo();
      $form=$this->createForm(TurismoType::class, $turismo);
      return $this->render('TurismoBundle:Default:algo.html.twig', array('form'=>$form->createView()));
    }
}
