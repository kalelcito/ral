<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Familia;
use CoreBundle\Form\FamiliaType;

/**
 * Familia controller.
 *
 * @Route("/familia")
 */
class FamiliaController extends Controller
{
    /** index test
     * Lists all Familia entities.
     *
     * @Route("/", name="familia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $familias = $em->getRepository('CoreBundle:Familia')->findAll();

        return $this->render('familia/index.html.twig', array(
            'familias' => $familias,
        ));
    }

    /**
     * Creates a new Familia entity.
     *
     * @Route("/new", name="familia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $familium = new Familia();
        $form = $this->createForm('CoreBundle\Form\FamiliaType', $familium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($familium);
            $em->flush();

            return $this->redirectToRoute('familia_show', array('id' => $familium->getId()));
        }

        return $this->render('familia/new.html.twig', array(
            'familium' => $familium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Familia entity.
     *
     * @Route("/{id}", name="familia_show")
     * @Method("GET")
     */
    public function showAction(Familia $familium)
    {
        $deleteForm = $this->createDeleteForm($familium);

        return $this->render('familia/show.html.twig', array(
            'familium' => $familium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Familia entity.
     *
     * @Route("/{id}/edit", name="familia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Familia $familium)
    {
        $deleteForm = $this->createDeleteForm($familium);
        $editForm = $this->createForm('CoreBundle\Form\FamiliaType', $familium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($familium);
            $em->flush();

            //return $this->redirectToRoute('familia_edit', array('id' => $familium->getId()));
            return $this->redirectToRoute('familia_index');

        }

        return $this->render('familia/edit.html.twig', array(
            'familium' => $familium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Familia entity.
     *
     * @Route("/{id}", name="familia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Familia $familium)
    {
        $form = $this->createDeleteForm($familium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($familium);
            $em->flush();
        }

        return $this->redirectToRoute('familia_index');
    }

    /**
     * Creates a form to delete a Familia entity.
     *
     * @param Familia $familium The Familia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Familia $familium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('familia_delete', array('id' => $familium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
