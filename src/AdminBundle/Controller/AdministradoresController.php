<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Administradores;
use CoreBundle\Form\AdministradoresType;

/**
 * Administradores controller.
 *
 * @Route("/administradores")
 */
class AdministradoresController extends Controller
{
    /** index test
     * Lists all Administradores entities.
     *
     * @Route("/", name="administradores_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $administradores = $em->getRepository('CoreBundle:Administradores')->findAll();

        return $this->render('administradores/index.html.twig', array(
            'administradores' => $administradores,
        ));
    }

    /**
     * Creates a new Administradores entity.
     *
     * @Route("/new", name="administradores_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $administradore = new Administradores();
        $form = $this->createForm('CoreBundle\Form\AdministradoresType', $administradore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($administradore);
            $em->flush();

            return $this->redirectToRoute('administradores_show', array('id' => $administradore->getId()));
        }

        return $this->render('administradores/new.html.twig', array(
            'administradore' => $administradore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Administradores entity.
     *
     * @Route("/{id}", name="administradores_show")
     * @Method("GET")
     */
    public function showAction(Administradores $administradore)
    {
        $deleteForm = $this->createDeleteForm($administradore);

        return $this->render('administradores/show.html.twig', array(
            'administradore' => $administradore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Administradores entity.
     *
     * @Route("/{id}/edit", name="administradores_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Administradores $administradore)
    {
        $deleteForm = $this->createDeleteForm($administradore);
        $editForm = $this->createForm('CoreBundle\Form\AdministradoresType', $administradore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($administradore);
            $em->flush();

            //return $this->redirectToRoute('administradores_edit', array('id' => $administradore->getId()));
            return $this->redirectToRoute('administradores_index');

        }

        return $this->render('administradores/edit.html.twig', array(
            'administradore' => $administradore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Administradores entity.
     *
     * @Route("/{id}", name="administradores_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Administradores $administradore)
    {
        $form = $this->createDeleteForm($administradore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($administradore);
            $em->flush();
        }

        return $this->redirectToRoute('administradores_index');
    }

    /**
     * Creates a form to delete a Administradores entity.
     *
     * @param Administradores $administradore The Administradores entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Administradores $administradore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administradores_delete', array('id' => $administradore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
