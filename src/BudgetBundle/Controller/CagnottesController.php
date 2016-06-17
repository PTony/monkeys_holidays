<?php

namespace BudgetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BudgetBundle\Entity\Cagnottes;
use BudgetBundle\Form\CagnottesType;

/**
 * Cagnottes controller.
 *
 */
class CagnottesController extends Controller
{
    /**
     * Lists all Cagnottes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cagnottes = $em->getRepository('BudgetBundle:Cagnottes')->findAll();

        return $this->render('cagnottes/index.html.twig', array(
            'cagnottes' => $cagnottes,
        ));
    }

    /**
     * Creates a new Cagnottes entity.
     *
     */
    public function newAction(Request $request)
    {
        $cagnotte = new Cagnottes();
        $form = $this->createForm('BudgetBundle\Form\CagnottesType', $cagnotte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cagnotte);
            $em->flush();

            return $this->redirectToRoute('cagnottes_show', array('id' => $cagnotte->getId()));
        }

        return $this->render('cagnottes/new.html.twig', array(
            'cagnotte' => $cagnotte,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cagnottes entity.
     *
     */
    public function showAction(Cagnottes $cagnotte)
    {
        $deleteForm = $this->createDeleteForm($cagnotte);

        return $this->render('cagnottes/show.html.twig', array(
            'cagnotte' => $cagnotte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cagnottes entity.
     *
     */
    public function editAction(Request $request, Cagnottes $cagnotte)
    {
        $deleteForm = $this->createDeleteForm($cagnotte);
        $editForm = $this->createForm('BudgetBundle\Form\CagnottesType', $cagnotte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cagnotte);
            $em->flush();

            return $this->redirectToRoute('cagnottes_edit', array('id' => $cagnotte->getId()));
        }

        return $this->render('cagnottes/edit.html.twig', array(
            'cagnotte' => $cagnotte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Cagnottes entity.
     *
     */
    public function deleteAction(Request $request, Cagnottes $cagnotte)
    {
        $form = $this->createDeleteForm($cagnotte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cagnotte);
            $em->flush();
        }

        return $this->redirectToRoute('cagnottes_index');
    }

    /**
     * Creates a form to delete a Cagnottes entity.
     *
     * @param Cagnottes $cagnotte The Cagnottes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cagnottes $cagnotte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cagnottes_delete', array('id' => $cagnotte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
