<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/linea/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="category")
     */
    public function categoryAction()
    {
        return $this->render('FrontendBundle:Default:category.html.twig');
    }

}
