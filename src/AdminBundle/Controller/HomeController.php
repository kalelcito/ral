<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Home;

/**
 * Home controller.
 *
 * @Route("/home")
 */
class HomeController extends Controller
{
    /** index test
     * Lists all Home entities.
     *
     * @Route("/", name="home_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $homes = $em->getRepository('CoreBundle:Home')->findAll();

        return $this->render('home/index.html.twig', array(
            'homes' => $homes,
        ));
    }

    /**
     * Creates a new Home entity.
     *
     * @Route("/new", name="home_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $home = new Home();
        $form = $this->createForm('CoreBundle\Form\HomeType', $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($home->getImagen()){
                $file = $home->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $home->setImagen($fileName);
            }

            $em->persist($home);
            $em->flush();

            return $this->redirectToRoute('home_show', array('id' => $home->getId()));
        }

        return $this->render('home/new.html.twig', array(
            'home' => $home,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Home entity.
     *
     * @Route("/{id}", name="home_show")
     * @Method("GET")
     */
    public function showAction(Home $home)
    {
        $deleteForm = $this->createDeleteForm($home);

        return $this->render('home/show.html.twig', array(
            'home' => $home,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Home entity.
     *
     * @Route("/{id}/edit", name="home_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Home $home)
    {
        $deleteForm = $this->createDeleteForm($home);
        $editForm = $this->createForm('CoreBundle\Form\HomeType', $home);
        $tmp = $home->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($home->getImagen()){
                $file = $home->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $home->setImagen($fileName);
            }else{
                $home->setImagen($tmp);
            }

            $em->persist($home);
            $em->flush();

            //return $this->redirectToRoute('home_edit', array('id' => $home->getId()));
            return $this->redirectToRoute('home_index');

        }

        return $this->render('home/edit.html.twig', array(
            'home' => $home,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Home entity.
     *
     * @Route("/{id}", name="home_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Home $home)
    {
        $form = $this->createDeleteForm($home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$home->getImagen());
            $em->remove($home);
            $em->flush();
        }

        return $this->redirectToRoute('home_index');
    }

    /**
     * Creates a form to delete a Home entity.
     *
     * @param Home $home The Home entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Home $home)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('home_delete', array('id' => $home->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
