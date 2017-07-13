<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $banners=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Banners');
        $query = $repository->createQueryBuilder('b')
            ->where('b.activo = :act')
            ->orderby('b.id','ASC')
            ->setParameter('act', '1')
            ->getQuery();
        $banners = $query->getResult();
        return $this->render('FrontendBundle:Default:index.html.twig',array('banners'=>$banners));
    }

    /**
     * @Route("/about-us", name="about")
     */
    public function aboutAction()
    {
        return $this->render('FrontendBundle:Default:about.html.twig');
    }

    /**
     * @Route("/quality", name="quality")
     */
    public function qualityAction()
    {
        return $this->render('FrontendBundle:Default:quality.html.twig');
    }

    /**
     * @Route("/service", name="service")
     */
    public function serviceAction()
    {
        return $this->render('FrontendBundle:Default:service.html.twig');
    }

    /**
     * @Route("/certification", name="certification")
     */
    public function certificationAction()
    {
        return $this->render('FrontendBundle:Default:certification.html.twig');
    }

    /**
     * @Route("/customers", name="customers")
     */
    public function customersAction()
    {
        return $this->render('FrontendBundle:Default:customers.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contactAction()
    {
        return $this->render('FrontendBundle:Default:contact.html.twig');
    }

    /**
     * @Route("/privacy", name="privacy")
     */
    public function privacyAction()
    {
        return $this->render('FrontendBundle:Default:privacy.html.twig');
    }

    /**
     * @Route("/Centro-de-Tecnologia-Aplicada", name="cta")
     */
    public function catAction()
    {
        return $this->render('FrontendBundle:Default:cta.html.twig');
    }

    /**
     * @Route("/mapa/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="maps")
     */
    public function mapsAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $mapa = $em->getRepository('CoreBundle:MapsDistribuidor')->findOneBy(array('slug'=>$slug,'activo'=>1));
        $distribuidores = $em->getRepository('CoreBundle:MapsDistribuidorDirectorio')->findBy(array('mapsDistribuidor'=>$mapa->getId(),'activo'=>1));
        return $this->render('FrontendBundle:Default:maps.html.twig',array('mapa'=>$mapa,'distribuidores'=>$distribuidores));
    }

    /**
     * @Route("/articulo/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="articulo")
     */
    public function articuloAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('CoreBundle:Articulos')->findOneBy(array('slug'=>$slug,'activo'=>1));
        return $this->render('FrontendBundle:Default:article.html.twig',array('articulo'=>$data));
    }

    /**
     * @Route("/Error404", name="error404")
     */
    public function error404Action(){
        return $this->render('@Twig/Exception/error404.html.twig');
    }
}
