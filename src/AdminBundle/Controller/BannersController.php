<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Banners;
use CoreBundle\Form\BannersType;

/**
 * Banners controller.
 *
 * @Route("/banners")
 */
class BannersController extends Controller
{
    /** index test
     * Lists all Banners entities.
     *
     * @Route("/", name="banners_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banners = $em->getRepository('CoreBundle:Banners')->findAll();

        return $this->render('banners/index.html.twig', array(
            'banners' => $banners,
        ));
    }

    /**
     * Creates a new Banners entity.
     *
     * @Route("/new", name="banners_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $banner = new Banners();
        $form = $this->createForm('CoreBundle\Form\BannersType', $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($banner->getImagen()){
                $file = $banner->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $banner->setImagen($fileName);
            }

            $em->persist($banner);
            $em->flush();

            return $this->redirectToRoute('banners_show', array('id' => $banner->getId()));
        }

        return $this->render('banners/new.html.twig', array(
            'banner' => $banner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Banners entity.
     *
     * @Route("/{id}", name="banners_show")
     * @Method("GET")
     */
    public function showAction(Banners $banner)
    {
        $deleteForm = $this->createDeleteForm($banner);

        return $this->render('banners/show.html.twig', array(
            'banner' => $banner,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Banners entity.
     *
     * @Route("/{id}/edit", name="banners_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Banners $banner)
    {
        $deleteForm = $this->createDeleteForm($banner);
        $editForm = $this->createForm('CoreBundle\Form\BannersType', $banner);
        $tmp = $banner->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($banner->getImagen()){
                $file = $banner->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $banner->setImagen($fileName);
            }else{
                $banner->setImagen($tmp);
            }

            $em->persist($banner);
            $em->flush();

            //return $this->redirectToRoute('banners_edit', array('id' => $banner->getId()));
            return $this->redirectToRoute('banners_index');

        }

        return $this->render('banners/edit.html.twig', array(
            'banner' => $banner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Banners entity.
     *
     * @Route("/{id}", name="banners_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Banners $banner)
    {
        $form = $this->createDeleteForm($banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$banner->getImagen());
            $em->remove($banner);
            $em->flush();
        }

        return $this->redirectToRoute('banners_index');
    }

    /**
     * Creates a form to delete a Banners entity.
     *
     * @param Banners $banner The Banners entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Banners $banner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('banners_delete', array('id' => $banner->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
