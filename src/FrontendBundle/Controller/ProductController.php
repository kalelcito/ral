<?php

namespace FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/producto/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="product")
     */
    public function productAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('CoreBundle:Productos')->findOneBy(array('slug'=>$slug,'activo'=>1));
        $mas = null;
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Productos');
        $query = $repository->createQueryBuilder('p')
            ->where('p.activo = :act')
            ->andwhere('p.slug != :slug')
            ->setParameter('act', '1')
            ->setParameter('slug', $slug)
            ->setMaxResults(3)
            ->getQuery();
        $mas = $query->getResult();
        if(!$producto){
            return $this->render('@Twig/Exception/error404.html.twig');
        }
        return $this->render('FrontendBundle:Default:product.html.twig',array('producto'=>$producto,'categoria'=>$producto->getFamilia()->getCategoria(),'mas'=>$mas));
    }
}
