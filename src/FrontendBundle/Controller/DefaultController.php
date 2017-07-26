<?php

namespace FrontendBundle\Controller;

use DOMDocument;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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
        $em = $this->getDoctrine()->getManager();
        $articulo = $em->getRepository('CoreBundle:Articulos')->findBy(array('activo'=>1),array('created_at'=>'DESC'));
        $doc = new DOMDocument();
        $doc->loadHTML($articulo[0]->getContenido());
        $imageTags = $doc->getElementsByTagName('img');
        $img = array();
        foreach($imageTags as $tag) {
            array_push($img,$tag->getAttribute('src'));
        }
        $secciones = $em->getRepository('CoreBundle:Home')->findBy(array('activo'=>1),array('orden'=>'ASC'));
        $input = array();
        $o1=0;
        $o2=0;
        $o3=0;
        $o4=0;
        $o5=0;
        foreach ($secciones as $item):
            if($item->getOrden()==1 and $o1==0){
                array_push($input,$item);
                $o1=1;
            }
            if($item->getOrden()==2 and $o2==0){
                array_push($input,$item);
                $o2=1;
            }
            if($item->getOrden()==3 and $o3==0){
                array_push($input,$item);
                $o3=1;
            }
            if($item->getOrden()==4 and $o4==0){
                array_push($input,$item);
                $o4=1;
            }
            if($item->getOrden()==5 and $o5==0){
                array_push($input,$item);
                $o5=1;
            }
        endforeach;
        return $this->render('FrontendBundle:Default:index.html.twig',array('banners'=>$banners,'articulo'=>$articulo,'image'=>$img[0],'secciones'=>$input));
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

    /**
     * @Route("/buscar/{page}/{q}", name="buscar")
     */
    public function buscarAction(Request $request,$page=1,$q=""){
        if($request->getMethod()=='POST'){
            $data = $request->request->all();
            $q = $data['buscar'];
            $t = $data['tipo'];
            $page = $data['p'];
        }
        $em = $this->getDoctrine()->getManager();
        if($t==1){
            $posts = $em->getRepository('CoreBundle:Articulos')->getAllSearch($page,$q,$t);
        }elseif ($t==2){
            $posts = $em->getRepository('CoreBundle:Productos')->getAllSearch($page,$q,$t);
        }elseif ($t==3){
            $posts = $em->getRepository('CoreBundle:Categoria')->getAllSearch($page,$q,$t);
        }elseif ($t==4){
            $posts = $em->getRepository('CoreBundle:MapsDistribuidor')->getAllSearch($page,$q,$t);
        }elseif ($t==5){
            $posts = $em->getRepository('CoreBundle:MapsDistribuidorDirectorio')->getAllSearch($page,$q,$t);
        }

        $totalPosts = $posts->count();
        $iterator = $posts->getIterator();
        $limit = 10;
        $maxPages = ceil($posts->count() / $limit);
        $thisPage = $page;
        return $this->render('FrontendBundle:Default:search.html.twig',
            array(
                "items"=>$iterator,
                "maxPages"=>$maxPages,
                "thisPage"=>$thisPage,
                "totalPosts"=>$totalPosts,
                "q"=>$q,
                "t"=>$t
            ));
    }
}
