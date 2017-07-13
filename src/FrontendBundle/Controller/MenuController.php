<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MenuController extends Controller
{
    public function productosAction()
    {
        $categorias=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Categoria');
        $query = $repository->createQueryBuilder('c')
            ->where('c.activo = :act')
            ->orderby('c.orden','ASC')
            ->setParameter('act', '1')
            ->getQuery();
        $categorias = $query->getResult();
        return $this->render('@Frontend/partials/producto.html.twig', array('categorias' => $categorias));
    }

    public function nacionalAction()
    {
        $nacionales=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:MapsDistribuidor');
        $query = $repository->createQueryBuilder('n')
            ->where('n.activo = :act')
            ->andwhere('n.zona != :zon')
            ->orderby('n.nombre','ASC')
            ->setParameter('act', '1')
            ->setParameter('zon', 'Internacional')
            ->getQuery();
        $nacionales = $query->getResult();
        return $this->render('@Frontend/partials/nacional.html.twig', array('nacionales' => $nacionales));
    }

    public function internacionalAction(){
        $internacionales=null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:MapsDistribuidor');
        $query = $repository->createQueryBuilder('i')
            ->where('i.activo = :act')
            ->andwhere('i.zona = :zon')
            ->orderby('i.nombre','ASC')
            ->setParameter('act', '1')
            ->setParameter('zon', 'Internacional')
            ->getQuery();
        $internacionales = $query->getResult();
        return $this->render('@Frontend/partials/internacional.html.twig', array('internacionales' => $internacionales));
    }
}
