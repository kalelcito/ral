<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Articulos;
use CoreBundle\Form\ArticulosType;

/**
 * Articulos controller.
 *
 * @Route("/articulos")
 */
class ArticulosController extends Controller
{
    /** index test
     * Lists all Articulos entities.
     *
     * @Route("/", name="articulos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articulos = $em->getRepository('CoreBundle:Articulos')->findAll();

        return $this->render('articulos/index.html.twig', array(
            'articulos' => $articulos,
        ));
    }

    /**
     * Creates a new Articulos entity.
     *
     * @Route("/new", name="articulos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $articulo = new Articulos();
        $form = $this->createForm('CoreBundle\Form\ArticulosType', $articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articulo);
            $em->flush();

            return $this->redirectToRoute('articulos_show', array('id' => $articulo->getId()));
        }

        return $this->render('articulos/new.html.twig', array(
            'articulo' => $articulo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Articulos entity.
     *
     * @Route("/{id}", name="articulos_show")
     * @Method("GET")
     */
    public function showAction(Articulos $articulo)
    {
        $deleteForm = $this->createDeleteForm($articulo);

        return $this->render('articulos/show.html.twig', array(
            'articulo' => $articulo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Articulos entity.
     *
     * @Route("/{id}/edit", name="articulos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Articulos $articulo)
    {
        $deleteForm = $this->createDeleteForm($articulo);
        $editForm = $this->createForm('CoreBundle\Form\ArticulosType', $articulo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articulo);
            $em->flush();

            //return $this->redirectToRoute('articulos_edit', array('id' => $articulo->getId()));
            return $this->redirectToRoute('articulos_index');

        }

        return $this->render('articulos/edit.html.twig', array(
            'articulo' => $articulo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Articulos entity.
     *
     * @Route("/{id}", name="articulos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Articulos $articulo)
    {
        $form = $this->createDeleteForm($articulo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($articulo);
            $em->flush();
        }

        return $this->redirectToRoute('articulos_index');
    }

    /**
     * Creates a form to delete a Articulos entity.
     *
     * @param Articulos $articulo The Articulos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Articulos $articulo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('articulos_delete', array('id' => $articulo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
