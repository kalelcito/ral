<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\MapsDistribuidor;
use CoreBundle\Form\MapsDistribuidorType;

/**
 * MapsDistribuidor controller.
 *
 * @Route("/mapsdistribuidor")
 */
class MapsDistribuidorController extends Controller
{
    /** index test
     * Lists all MapsDistribuidor entities.
     *
     * @Route("/", name="mapsdistribuidor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mapsDistribuidors = $em->getRepository('CoreBundle:MapsDistribuidor')->findAll();

        return $this->render('mapsdistribuidor/index.html.twig', array(
            'mapsDistribuidors' => $mapsDistribuidors,
        ));
    }

    /**
     * Creates a new MapsDistribuidor entity.
     *
     * @Route("/new", name="mapsdistribuidor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mapsDistribuidor = new MapsDistribuidor();
        $form = $this->createForm('CoreBundle\Form\MapsDistribuidorType', $mapsDistribuidor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mapsDistribuidor);
            $em->flush();

            return $this->redirectToRoute('mapsdistribuidor_show', array('id' => $mapsDistribuidor->getId()));
        }

        return $this->render('mapsdistribuidor/new.html.twig', array(
            'mapsDistribuidor' => $mapsDistribuidor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MapsDistribuidor entity.
     *
     * @Route("/{id}", name="mapsdistribuidor_show")
     * @Method("GET")
     */
    public function showAction(MapsDistribuidor $mapsDistribuidor)
    {
        $deleteForm = $this->createDeleteForm($mapsDistribuidor);

        return $this->render('mapsdistribuidor/show.html.twig', array(
            'mapsDistribuidor' => $mapsDistribuidor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MapsDistribuidor entity.
     *
     * @Route("/{id}/edit", name="mapsdistribuidor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MapsDistribuidor $mapsDistribuidor)
    {
        $deleteForm = $this->createDeleteForm($mapsDistribuidor);
        $editForm = $this->createForm('CoreBundle\Form\MapsDistribuidorType', $mapsDistribuidor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mapsDistribuidor);
            $em->flush();

            //return $this->redirectToRoute('mapsdistribuidor_edit', array('id' => $mapsDistribuidor->getId()));
            return $this->redirectToRoute('mapsdistribuidor_index');

        }

        return $this->render('mapsdistribuidor/edit.html.twig', array(
            'mapsDistribuidor' => $mapsDistribuidor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MapsDistribuidor entity.
     *
     * @Route("/{id}", name="mapsdistribuidor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MapsDistribuidor $mapsDistribuidor)
    {
        $form = $this->createDeleteForm($mapsDistribuidor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mapsDistribuidor);
            $em->flush();
        }

        return $this->redirectToRoute('mapsdistribuidor_index');
    }

    /**
     * Creates a form to delete a MapsDistribuidor entity.
     *
     * @param MapsDistribuidor $mapsDistribuidor The MapsDistribuidor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MapsDistribuidor $mapsDistribuidor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mapsdistribuidor_delete', array('id' => $mapsDistribuidor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
