<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/linea/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="category")
     */
    public function categoryAction($slug)
    {
        $interes=null;
        $rgb=null;
        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CoreBundle:Categoria');
        $query = $repository->createQueryBuilder('c')
            ->where('c.activo = :act')
            ->andwhere('c.slug != :slug')
            ->setParameter('act', '1')
            ->setParameter('slug', $slug)
            ->setMaxResults(3)
            ->getQuery();
        $interes = $query->getResult();
        $categoria = $em->getRepository('CoreBundle:Categoria')->findOneBy(array('slug'=>$slug,'activo'=>1));
        if(!$categoria){
            return $this->render('@Twig/Exception/error404.html.twig');
        }
        /*RGB*/
        preg_match_all('(\d+)', $categoria->getColor(), $rgb);
        $r=$rgb[0][0];
        $g=$rgb[0][1];
        $b=$rgb[0][2];
        $rt = intval(((255-$r)*50)/100);
        $gt = intval(((255-$g)*50)/100);
        $bt = intval(((255-$b)*50)/100);
        $newRGB = "rgb(".($rt+$r).",".($gt+$g).",".($bt+$b).")";
        /*RGB*/
        return $this->render('FrontendBundle:Default:category.html.twig',array('interes'=>$interes,'categoria'=>$categoria,'newRGB'=>$newRGB));
    }

}
