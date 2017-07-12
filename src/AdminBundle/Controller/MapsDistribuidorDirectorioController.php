<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\MapsDistribuidorDirectorio;
use CoreBundle\Form\MapsDistribuidorDirectorioType;

/**
 * MapsDistribuidorDirectorio controller.
 *
 * @Route("/mapsdistribuidordirectorio")
 */
class MapsDistribuidorDirectorioController extends Controller
{
    /** index test
     * Lists all MapsDistribuidorDirectorio entities.
     *
     * @Route("/", name="mapsdistribuidordirectorio_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mapsDistribuidorDirectorios = $em->getRepository('CoreBundle:MapsDistribuidorDirectorio')->findAll();

        return $this->render('mapsdistribuidordirectorio/index.html.twig', array(
            'mapsDistribuidorDirectorios' => $mapsDistribuidorDirectorios,
        ));
    }

    /**
     * Creates a new MapsDistribuidorDirectorio entity.
     *
     * @Route("/new", name="mapsdistribuidordirectorio_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mapsDistribuidorDirectorio = new MapsDistribuidorDirectorio();
        $form = $this->createForm('CoreBundle\Form\MapsDistribuidorDirectorioType', $mapsDistribuidorDirectorio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mapsDistribuidorDirectorio);
            $em->flush();

            return $this->redirectToRoute('mapsdistribuidordirectorio_show', array('id' => $mapsDistribuidorDirectorio->getId()));
        }

        return $this->render('mapsdistribuidordirectorio/new.html.twig', array(
            'mapsDistribuidorDirectorio' => $mapsDistribuidorDirectorio,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MapsDistribuidorDirectorio entity.
     *
     * @Route("/{id}", name="mapsdistribuidordirectorio_show")
     * @Method("GET")
     */
    public function showAction(MapsDistribuidorDirectorio $mapsDistribuidorDirectorio)
    {
        $deleteForm = $this->createDeleteForm($mapsDistribuidorDirectorio);

        return $this->render('mapsdistribuidordirectorio/show.html.twig', array(
            'mapsDistribuidorDirectorio' => $mapsDistribuidorDirectorio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MapsDistribuidorDirectorio entity.
     *
     * @Route("/{id}/edit", name="mapsdistribuidordirectorio_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MapsDistribuidorDirectorio $mapsDistribuidorDirectorio)
    {
        $deleteForm = $this->createDeleteForm($mapsDistribuidorDirectorio);
        $editForm = $this->createForm('CoreBundle\Form\MapsDistribuidorDirectorioType', $mapsDistribuidorDirectorio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mapsDistribuidorDirectorio);
            $em->flush();

            //return $this->redirectToRoute('mapsdistribuidordirectorio_edit', array('id' => $mapsDistribuidorDirectorio->getId()));
            return $this->redirectToRoute('mapsdistribuidordirectorio_index');

        }

        return $this->render('mapsdistribuidordirectorio/edit.html.twig', array(
            'mapsDistribuidorDirectorio' => $mapsDistribuidorDirectorio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MapsDistribuidorDirectorio entity.
     *
     * @Route("/{id}", name="mapsdistribuidordirectorio_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MapsDistribuidorDirectorio $mapsDistribuidorDirectorio)
    {
        $form = $this->createDeleteForm($mapsDistribuidorDirectorio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mapsDistribuidorDirectorio);
            $em->flush();
        }

        return $this->redirectToRoute('mapsdistribuidordirectorio_index');
    }

    /**
     * Creates a form to delete a MapsDistribuidorDirectorio entity.
     *
     * @param MapsDistribuidorDirectorio $mapsDistribuidorDirectorio The MapsDistribuidorDirectorio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MapsDistribuidorDirectorio $mapsDistribuidorDirectorio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mapsdistribuidordirectorio_delete', array('id' => $mapsDistribuidorDirectorio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
