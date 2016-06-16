<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Appartenir;
use AppBundle\Form\AppartenirType;

/**
 * Appartenir controller.
 *
 */
class AppartenirController extends Controller
{
    /**
     * Lists all Appartenir entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $appartenirs = $em->getRepository('AppBundle:Appartenir')->findAll();

        return $this->render('appartenir/index.html.twig', array(
            'appartenirs' => $appartenirs,
        ));
    }

    /**
     * Creates a new Appartenir entity.
     *
     */
    public function newAction(Request $request)
    {
        $appartenir = new Appartenir();
        $form = $this->createForm('AppBundle\Form\AppartenirType', $appartenir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appartenir);
            $em->flush();

            return $this->redirectToRoute('appartenir_show', array('id' => $appartenir->getId()));
        }

        return $this->render('appartenir/new.html.twig', array(
            'appartenir' => $appartenir,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Appartenir entity.
     *
     */
    public function showAction(Appartenir $appartenir)
    {
        $deleteForm = $this->createDeleteForm($appartenir);

        return $this->render('appartenir/show.html.twig', array(
            'appartenir' => $appartenir,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Appartenir entity.
     *
     */
    public function editAction(Request $request, Appartenir $appartenir)
    {
        $deleteForm = $this->createDeleteForm($appartenir);
        $editForm = $this->createForm('AppBundle\Form\AppartenirType', $appartenir);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appartenir);
            $em->flush();

            return $this->redirectToRoute('appartenir_edit', array('id' => $appartenir->getId()));
        }

        return $this->render('appartenir/edit.html.twig', array(
            'appartenir' => $appartenir,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Appartenir entity.
     *
     */
    public function deleteAction(Request $request, Appartenir $appartenir)
    {
        $form = $this->createDeleteForm($appartenir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($appartenir);
            $em->flush();
        }

        return $this->redirectToRoute('appartenir_index');
    }

    /**
     * Creates a form to delete a Appartenir entity.
     *
     * @param Appartenir $appartenir The Appartenir entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Appartenir $appartenir)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appartenir_delete', array('id' => $appartenir->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
