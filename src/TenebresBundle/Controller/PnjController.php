<?php

namespace TenebresBundle\Controller;

use TenebresBundle\Entity\Pnj;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pnj controller.
 *
 * @Route("pnj")
 */
class PnjController extends Controller
{
    /**
     * Lists all pnj entities.
     *
     * @Route("/", name="pnj_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pnjs = $em->getRepository('TenebresBundle:Pnj')->findAll();

        return $this->render('pnj/index.html.twig', array(
            'pnjs' => $pnjs,
        ));
    }

    /**
     * Creates a new pnj entity.
     *
     * @Route("/new", name="pnj_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pnj = new Pnj();
        $form = $this->createForm('TenebresBundle\Form\PnjType', $pnj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pnj);
            $em->flush();

            return $this->redirectToRoute('pnj_show', array('id' => $pnj->getId()));
        }

        return $this->render('pnj/new.html.twig', array(
            'pnj' => $pnj,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pnj entity.
     *
     * @Route("/{id}", name="pnj_show")
     * @Method("GET")
     */
    public function showAction(Pnj $pnj)
    {
        $deleteForm = $this->createDeleteForm($pnj);

        return $this->render('pnj/show.html.twig', array(
            'pnj' => $pnj,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pnj entity.
     *
     * @Route("/{id}/edit", name="pnj_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pnj $pnj)
    {
        $deleteForm = $this->createDeleteForm($pnj);
        $editForm = $this->createForm('TenebresBundle\Form\PnjType', $pnj);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pnj_edit', array('id' => $pnj->getId()));
        }

        return $this->render('pnj/edit.html.twig', array(
            'pnj' => $pnj,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pnj entity.
     *
     * @Route("/{id}", name="pnj_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pnj $pnj)
    {
        $form = $this->createDeleteForm($pnj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pnj);
            $em->flush();
        }

        return $this->redirectToRoute('pnj_index');
    }

    /**
     * Creates a form to delete a pnj entity.
     *
     * @param Pnj $pnj The pnj entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pnj $pnj)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pnj_delete', array('id' => $pnj->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
