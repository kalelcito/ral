<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Consejos;
use CoreBundle\Form\ConsejosType;

/**
 * Consejos controller.
 *
 * @Route("/consejos")
 */
class ConsejosController extends Controller
{
    /** index test
     * Lists all Consejos entities.
     *
     * @Route("/", name="consejos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $consejos = $em->getRepository('CoreBundle:Consejos')->findAll();

        return $this->render('consejos/index.html.twig', array(
            'consejos' => $consejos,
        ));
    }

    /**
     * Creates a new Consejos entity.
     *
     * @Route("/new", name="consejos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $consejo = new Consejos();
        $form = $this->createForm('CoreBundle\Form\ConsejosType', $consejo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($consejo);
            $em->flush();

            return $this->redirectToRoute('consejos_show', array('id' => $consejo->getId()));
        }

        return $this->render('consejos/new.html.twig', array(
            'consejo' => $consejo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Consejos entity.
     *
     * @Route("/{id}", name="consejos_show")
     * @Method("GET")
     */
    public function showAction(Consejos $consejo)
    {
        $deleteForm = $this->createDeleteForm($consejo);

        return $this->render('consejos/show.html.twig', array(
            'consejo' => $consejo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Consejos entity.
     *
     * @Route("/{id}/edit", name="consejos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Consejos $consejo)
    {
        $deleteForm = $this->createDeleteForm($consejo);
        $editForm = $this->createForm('CoreBundle\Form\ConsejosType', $consejo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($consejo);
            $em->flush();

            //return $this->redirectToRoute('consejos_edit', array('id' => $consejo->getId()));
            return $this->redirectToRoute('consejos_index');

        }

        return $this->render('consejos/edit.html.twig', array(
            'consejo' => $consejo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Consejos entity.
     *
     * @Route("/{id}", name="consejos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Consejos $consejo)
    {
        $form = $this->createDeleteForm($consejo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($consejo);
            $em->flush();
        }

        return $this->redirectToRoute('consejos_index');
    }

    /**
     * Creates a form to delete a Consejos entity.
     *
     * @param Consejos $consejo The Consejos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Consejos $consejo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('consejos_delete', array('id' => $consejo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
