<?php

namespace TenebresBundle\Controller;

use TenebresBundle\Entity\District;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * District controller.
 *
 * @Route("district")
 */
class DistrictController extends Controller
{
    /**
     * Lists all district entities.
     *
     * @Route("/", name="district_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $districts = $em->getRepository('TenebresBundle:District')->findAll();

        return $this->render('district/index.html.twig', array(
            'districts' => $districts,
        ));
    }

    /**
     * Creates a new district entity.
     *
     * @Route("/new", name="district_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $district = new District();
        $form = $this->createForm('TenebresBundle\Form\DistrictType', $district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($district);
            $em->flush();

            return $this->redirectToRoute('district_show', array('id' => $district->getId()));
        }

        return $this->render('district/new.html.twig', array(
            'district' => $district,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a district entity.
     *
     * @Route("/{id}", name="district_show")
     * @Method("GET")
     */
    public function showAction(District $district)
    {
        $deleteForm = $this->createDeleteForm($district);

        return $this->render('district/show.html.twig', array(
            'district' => $district,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing district entity.
     *
     * @Route("/{id}/edit", name="district_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, District $district)
    {
        $deleteForm = $this->createDeleteForm($district);
        $editForm = $this->createForm('TenebresBundle\Form\DistrictType', $district);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('district_edit', array('id' => $district->getId()));
        }

        return $this->render('district/edit.html.twig', array(
            'district' => $district,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a district entity.
     *
     * @Route("/{id}", name="district_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, District $district)
    {
        $form = $this->createDeleteForm($district);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($district);
            $em->flush();
        }

        return $this->redirectToRoute('district_index');
    }

    /**
     * Creates a form to delete a district entity.
     *
     * @param District $district The district entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(District $district)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('district_delete', array('id' => $district->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
