<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class partialsController extends Controller
{
    public function consejoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tmp = $em->getRepository('CoreBundle:Consejos')->findAll();
        $t = count($tmp);
        $consejo = $em->getRepository('CoreBundle:Consejos')->findOneBy(array('activo'=>1,'id'=>rand(1,$t)));
        return $this->render('@Frontend/partials/consejo.html.twig', array('consejo' => $consejo));
    }
}
