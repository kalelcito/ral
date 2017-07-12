<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use CoreBundle\Entity\Productos;
use CoreBundle\Form\ProductosType;

/**
 * Productos controller.
 *
 * @Route("/productos")
 */
class ProductosController extends Controller
{
    /** index test
     * Lists all Productos entities.
     *
     * @Route("/", name="productos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('CoreBundle:Productos')->findAll();

        return $this->render('productos/index.html.twig', array(
            'productos' => $productos,
        ));
    }

    /**
     * Creates a new Productos entity.
     *
     * @Route("/new", name="productos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $producto = new Productos();
        $form = $this->createForm('CoreBundle\Form\ProductosType', $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($producto->getImagen()){
                $file = $producto->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $producto->setImagen($fileName);
            }

            $em->persist($producto);
            $em->flush();

            return $this->redirectToRoute('productos_show', array('id' => $producto->getId()));
        }

        return $this->render('productos/new.html.twig', array(
            'producto' => $producto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Productos entity.
     *
     * @Route("/{id}", name="productos_show")
     * @Method("GET")
     */
    public function showAction(Productos $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);

        return $this->render('productos/show.html.twig', array(
            'producto' => $producto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Productos entity.
     *
     * @Route("/{id}/edit", name="productos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Productos $producto)
    {
        $deleteForm = $this->createDeleteForm($producto);
        $editForm = $this->createForm('CoreBundle\Form\ProductosType', $producto);
        $tmp = $producto->getImagen();
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if($producto->getImagen()){
                $file = $producto->getImagen();

                $fileName = md5(uniqid()).'.'.$file->guessExtension();

                $file->move(
                    $this->getParameter('img_directory'),
                    $fileName
                );

                $producto->setImagen($fileName);
            }else{
                $producto->setImagen($tmp);
            }

            $em->persist($producto);
            $em->flush();

            //return $this->redirectToRoute('productos_edit', array('id' => $producto->getId()));
            return $this->redirectToRoute('productos_index');

        }

        return $this->render('productos/edit.html.twig', array(
            'producto' => $producto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Productos entity.
     *
     * @Route("/{id}", name="productos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Productos $producto)
    {
        $form = $this->createDeleteForm($producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            unlink($this->getParameter('img_directory').'/'.$producto->getImagen());
            $em->remove($producto);
            $em->flush();
        }

        return $this->redirectToRoute('productos_index');
    }

    /**
     * Creates a form to delete a Productos entity.
     *
     * @param Productos $producto The Productos entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Productos $producto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productos_delete', array('id' => $producto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
