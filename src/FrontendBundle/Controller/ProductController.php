<?php

namespace FrontendBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/producto/{slug}.{_format}", defaults={"_format": "html"}, requirements={"_format": "html"}, name="product")
     */
    public function productAction()
    {
        return $this->render('FrontendBundle:Default:product.html.twig');
    }
}
